<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Throwable;
use function str_replace;
use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\View;
use Fisharebest\Webtrees\Gedcom;
use Illuminate\Support\Collection;
use Fisharebest\Webtrees\Individual;
use Fisharebest\Webtrees\FlashMessages;
use Psr\Http\Message\ResponseInterface;
use Fisharebest\Localization\Translation;
use Psr\Http\Message\ServerRequestInterface;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleConfigTrait;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleSidebarTrait;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleSidebarInterface;
use Fisharebest\Webtrees\Statistics\Service\CountryService;
use Illuminate\Database\Capsule\Manager as DB;

class FancyResearchLinksModule extends AbstractModule implements ModuleCustomInterface, ModuleConfigInterface, ModuleSidebarInterface
{
    use ModuleCustomTrait;
    use ModuleConfigTrait;
    use ModuleSidebarTrait;

    public const CUSTOM_AUTHOR = 'JustCarmen';
    public const CUSTOM_VERSION = '2.3.1-dev';
    public const GITHUB_REPO = 'webtrees-fancy-research-links';
    public const AUTHOR_WEBSITE = 'https://justcarmen.nl';
    public const CUSTOM_SUPPORT_URL = self::AUTHOR_WEBSITE . '/modules-webtrees-2/fancy-research-links/';

    private $country_service;

    /**
     * FancyResearchLinks constructor.
     *
     * @param CountryService $country_service
     */
    public function __construct(CountryService $country_service)
    {
        $this->country_service = $country_service;
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
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return self::CUSTOM_AUTHOR;
    }

    /**
     * The version of this module.
     *
     * @return string
     */
    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    /**
     * A URL that will provide the latest stable version of this module.
     *
     * @return string
     */
    public function customModuleLatestVersionUrl(): string
    {
        return 'https://raw.githubusercontent.com/' . self::CUSTOM_AUTHOR . '/' . self::GITHUB_REPO . '/main/latest-version.txt';
    }

    /**
     * Fetch the latest version of this module.
     *
     * @return string
     */
    public function customModuleLatestVersion(): string
    {
        return 'https://github.com/' . self::CUSTOM_AUTHOR . '/' . self::GITHUB_REPO . '/releases/latest';
    }

     /**
     * Where to get support for this module.  Perhaps a github repository?
     *
     * @return string
     */
    public function customModuleSupportUrl(): string
    {
        return self::CUSTOM_SUPPORT_URL;
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

        // Changes in version 2.3.1 require to reset the expanded_area setting if neccessary
        if (!array_key_exists($this->getPreference('expanded-area'), $this->getCountryList())) {
            DB::table('module_setting')
                ->where('module_name', '=', $this->name())
                ->where('setting_name', '=', 'expanded-area')
                ->delete();
        }
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
    public function getAdminAction(): ResponseInterface
    {
        $this->layout = 'layouts/administration';

        return $this->viewResponse($this->name() . '::settings', [
            'enabled_plugins'   => collect(explode(', ', $this->getPreference('enabled-plugins', $this->getPluginsByName()->join(', ')))),
            'expanded_area'     => $this->getCountryList()[$this->getPreference('expanded-area', 'INT')],
            'expand_sidebar'    => $this->getPreference('expand-sidebar'),
            'plugins'           => $this->getPluginsByArea()->sortkeys(),
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
            $this->setPreference('expanded-area', array_search($params['expanded-area'], $this->getCountryList()) ?? 'INT');
            $this->setPreference('expand-sidebar', $params['expand-sidebar'] ?? '0');
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
    public function sidebarTitle(Individual $individual): string
    {
        return view($this->name() . '::sidebar-header', [
            'module'   => $this,
            'is_admin' => Auth::isAdmin(),
        ]);
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
        $expand_sidebar     = (bool) $this->getPreference('expand-sidebar') && Auth::isEditor($individual->tree());
        $enabled_plugins    = collect(explode(', ', $this->getPreference('enabled-plugins', $this->getPluginsByName()->join(', '))));
        $expanded_area      = $this->getCountryList()[$this->getPreference('expanded-area', 'INT')];

        return view($this->name() . '::sidebar', [
            'attributes'        => $this->getAttributes($individual),
            'enabled_plugins'   => $enabled_plugins,
            'expanded_area'     => $expanded_area,
            'expand_sidebar'    => $expand_sidebar,
            'plugins'           => $this->getPluginsByArea(),
            'target_blank'      => $this->getPreference('target-blank'),
            'tree'              => $individual->tree(),
        ]);
    }

    /**
     * Additional/updated translations.
     *
     * @param string $language
     *
     * @return array
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
     * @return Collection
     */
    private function getPlugins(): Collection
    {
        $pattern   = __DIR__ . '/plugins/*Plugin.php';
        $filenames = glob($pattern);

        $collection = Collection::make($filenames)
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

        // We need to sort the collection by plugin label
        $plugins = $collection->mapToGroups(function ($plugin) {
            return [$plugin->pluginLabel() => $plugin];
        });

        // We only need the values of the sorted collection in a flattened way
        return $plugins->sortkeys()->values()->flatten();
    }

    /**
     * Group plugins by Area
     *
     * @return Collection
     */
    private function getPluginsByArea(): Collection
    {
        $plugins = $this->getPlugins();

        $collection = $plugins->mapToGroups(function ($plugin) {
            $area = $plugin->researchArea();
            $area_fullname = $this->getCountryList()[$area];
            return [$area_fullname => $plugin];
        });

        // The first group should be the expanded area. Remove the group from the collection
        $expanded_area  = $this->getCountryList()[$this->getPreference('expanded-area', 'INT')];
        $pluginlist = $collection->filter()->except($expanded_area);

        // return the localized sorted list with the expanded area on top
        return $pluginlist->sortkeys()->prepend($collection->get($expanded_area), $expanded_area);
    }

    /**
     * Get a list of plugins by their plugin name
     *
     * @return Collection
     */
    private function getPluginsByName(): Collection
    {
        $plugins = $this->getPlugins();

        $pluginlist = $plugins->map(function ($plugin) {
            return $plugin->pluginName();
        });

        return $pluginlist;
    }

    /**
     * Get a list of all countries
     *
     * @return array
     */
    private function getCountryList(): array
    {
        // Add our 'International' area to the list of countries
        $countries = $this->country_service->getAllCountries();
        $countries['INT'] = I18N::translate('International');

        return $countries;
    }

    /**
     * Make the attributes array for use in the plugins.
     *
     * @param Individual $individual
     *
     * @return array
     */
    public function getAttributes(Individual $individual): array
    {
        $all_names  = $individual->getAllNames();
        $name       = $all_names[0];

        // add some custom name attributes
        $name['first']  = explode(" ", $name['givn'])[0];
        $name['prefix'] = trim(str_replace($name['surn'], '', $name['surname']));
        $name['fullNN'] = trim(strip_tags(str_replace('@N.N.', '', $name['fullNN'])));

        // extract the Marriage name
        $name['msurname'] = '';
        if (count($all_names) > 1) {
            foreach ($all_names as $names) {
                if ($names['type'] === '_MARNM') {
                    $name['msurname'] = $names['surname'];
                    break;
                }
            }
        }

        // support all birth (birt, chr, bapm) and death events (deat, buri, crem)
        $gedcom_events = array_merge(Gedcom::BIRTH_EVENTS, Gedcom::DEATH_EVENTS);

        foreach ($gedcom_events as $event) {

            $year[$event] = '';
            $place[$event] = '';
            $country[$event] = '';

            $edates = $individual->getAllEventDates([$event]);

            if ($edates !== []) {
                foreach ($edates as $edate) {
                    $year[$event] = $edate->minimumDate()->format('%Y');
                }
            }

            $eplaces = $individual->getAllEventPlaces([$event]);

            if ($eplaces !== []) {
                foreach ($eplaces as $eplace) {
                    $place[$event] = strip_tags($eplace->placeName());
                    $country[$event] = strip_tags($eplace->lastParts(1)->first());
                }
            }
        }

        $attributes = array(
            'NAME'      => $name,
            'YEAR'      => $year,
            'PLACE'     => $place,
            'COUNTRY'   => $country
        );

        return $attributes;
    }
};
