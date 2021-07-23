<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Throwable;
use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\View;
use Illuminate\Support\Collection;
use Fisharebest\Webtrees\Individual;
use Fisharebest\Webtrees\FlashMessages;
use Psr\Http\Message\ResponseInterface;
use Fisharebest\Localization\Translation;
use Psr\Http\Message\ServerRequestInterface;
use Fisharebest\Webtrees\Services\TreeService;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleConfigTrait;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleSidebarTrait;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleSidebarInterface;

use function str_replace;

class FancyResearchLinksModule extends AbstractModule implements ModuleCustomInterface, ModuleConfigInterface, ModuleSidebarInterface
{
    use ModuleCustomTrait;
    use ModuleConfigTrait;
    use ModuleSidebarTrait;

    /** @var TreeService */
    private $tree_service;

    /**
     * FancyResearchLinks constructor.
     *
     * @param TreeService       $tree_service
     */
    public function __construct(TreeService $tree_service)
    {
        $this->tree_service = $tree_service;
    }

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return I18N::translate('Fancy Research Links');
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return I18N::translate('A sidebar tool to provide quick links to popular research web sites.');
    }

    /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleAuthorName()
     */
    public function customModuleAuthorName(): string
    {
        return 'JustCarmen';
    }

    /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleVersion()     *
     */
    public function customModuleVersion(): string
    {
        return '2.0.0-dev';
    }

    /**
     * A URL that will provide the latest stable version of this module.
     *
     * @return string
     */
    public function customModuleLatestVersionUrl(): string
    {
        return 'https://raw.githubusercontent.com/JustCarmen/webtrees-fancy-research-links/master/latest-version.txt';
    }

    /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleSupportUrl()
     */
    public function customModuleSupportUrl(): string
    {
        return 'https://github.com/justcarmen/webtrees-fancy-research-links/issues';
    }

    /**
     * Bootstrap.  This function is called on *enabled* modules.
     * It is a good place to register routes and views.
     *
     * @return void
     */
    public function boot(): void
    {
        // Register a namespace for our views.
        View::registerNamespace($this->name(), $this->resourcesFolder() . 'views/');
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function getAdminAction(ServerRequestInterface $request): ResponseInterface
    {
        $this->layout = 'layouts/administration';

        return $this->viewResponse($this->name() . '::settings', [
            'enabled_plugins'   => collect(explode(', ', $this->getPreference('enabled-plugins', $this->getPluginsByName()->join(', ')))),
            'expanded_area'     => $this->getPreference('expanded-area', I18N::translate('International')),
            'expand_sidebar'    => $this->getPreference('expand-sidebar'),
            'plugins'           => $this->getPluginsByArea(),
            'target_blank'      => $this->getPreference('target-blank'),
            'title'             => $this->title()
        ]);
    }

    /**
     * Save the user preference.
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function postAdminAction(ServerRequestInterface $request): ResponseInterface
    {
        $params = (array) $request->getParsedBody();

        if (isset($params['enabled-plugins'])) {
            $enabled_plugins = (string) implode(', ', array_keys($params['enabled-plugins']));
        } else {
            $enabled_plugins = (string) $this->getPluginsByName()->join(', ');
        }

        if ($params['save'] === '1') {
            $this->setPreference('enabled-plugins', $enabled_plugins);
            $this->setPreference('expanded-area', $params['expanded-area'] ?? I18N::translate('International'));
            $this->setPreference('expand-sidebar',$params['expand-sidebar'] ?? '0');
            $this->setPreference('target-blank', $params['target-blank'] ?? '0');

            $message = I18N::translate('The preferences for the module “%s” have been updated.', $this->title());
            FlashMessages::addMessage($message, 'success');
        }

        return redirect($this->getConfigLink());
    }

    /**
     * The text that appears on the sidebar's title.
     *
     * @return string
     */
    public function sidebarTitle(): string
    {
        return I18N::translate('Research links');
    }

    /**
     * The default position for this sidebar.  It can be changed in the control panel.
     *
     * @return int
     */
    public function defaultSidebarOrder(): int
    {
        return 1;
    }

    /**
     * Does this sidebar have anything to display for this individual?
     *
     * @param Individual $individual
     *
     * @return bool
     */
    public function hasSidebarContent(Individual $individual): bool
    {
        return true;
    }

    /**
     * Load this sidebar synchronously.
     *
     * @param Individual $individual
     *
     * @return string
     */
    public function getSidebarContent(Individual $individual): string
    {
        $names  = $individual->getAllNames();
        $name   = $names[0];

        $first_name    = explode(" ", $name['givn'])[0];
        $name['first'] = $first_name;

        $pf_name = str_replace($name['surn'], '', $name['surname']);
        $name['prefix'] = trim($pf_name);

        $birth['year'] = $individual->getBirthYear();
        $birth['place'] = $individual->getBirthPlace();
        $death['year'] = $individual->getDeathYear();
        $death['place'] = $individual->getDeathPlace();

        $expand_sidebar     = (bool) $this->getPreference('expand-sidebar') && Auth::isEditor($individual->tree());
        $enabled_plugins    = collect(explode(', ', $this->getPreference('enabled-plugins', $this->getPluginsByName()->join(', '))));
        $expanded_area      = $this->getPreference('expanded-area', I18N::translate('International'));

        return view($this->name() . '::sidebar', [
            'birth'             => $birth,
            'death'             => $death,
            'enabled_plugins'   => $enabled_plugins,
            'expanded_area'     => $expanded_area,
            'expand_sidebar'    => $expand_sidebar,
            'name'              => $name,
            'plugins'           => $this->getPluginsByArea(),
            'target_blank'      => $this->getPreference('target-blank'),
            'tree'              => $individual->tree()
        ]);
    }


    /**
     * Additional/updated translations.
     *
     * @param string $language
     *
     * @return string[]
     */
    public function customTranslations(string $language): array
    {
        $lang_dir   = $this->resourcesFolder() . 'lang/';
        $file       = $lang_dir . $language . '.mo';
        if (file_exists($file)) {
            return (new Translation($file))->asArray();
        } else {
            return [];
        }
    }

    /**
     * Collect all plugins from the plugins folder
     *
     * @return Collection<ModuleCustomInterface>
     */
    private function getPlugins(): Collection
    {
        $pattern   = __DIR__ . '/plugins/*Plugin.php';
        $filenames = glob($pattern, GLOB_NOSORT);

        return Collection::make($filenames)
            ->map(static function (string $filename) {
                try {
                    $path_parts = pathinfo($filename);
                    $plugin = app(__NAMESPACE__ . '\Plugin\\' . $path_parts['filename']);
                    return $plugin;
                } catch (Throwable $ex) {
                    FlashMessages::addMessage(I18N::translate('There was an error loading the plugin ' . $path_parts['filename'] . '.') . '<br>' . e($ex->getMessage()), 'danger');
                    throw $ex;
                }
            });
    }

    private function getPluginsByArea(): Collection
    {
        $plugins = $this->getPlugins();

        $pluginlist = $plugins->mapToGroups(static function ($plugin) {
            return [$plugin->researchArea() => $plugin];
        });

        return $pluginlist->sortkeys();
    }

    private function getPluginsByName(): Collection
    {
        $plugins = $this->getPlugins();

        $pluginlist = new Collection();
        foreach ($plugins as $plugin) {
            $pluginlist->push($plugin->pluginName());
        };

        return $pluginlist;
    }
};
