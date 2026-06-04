<?php

/**
 * ModuleCustomTrait class to receive custom module information
 *
 * justcarmen/jc-common-code:
 * Library to share common code between custom modules for webtrees by JustCarmen
 *
 */

declare(strict_types=1);

namespace JustCarmen\Webtrees\Traits;

/**
 * Trait ModuleCustomTrait
 */
trait ModuleCustomTrait
{
    use \Fisharebest\Webtrees\Module\ModuleCustomTrait;

     /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleAuthorName()
     */
    public function customModuleAuthorName(): string
    {
        return self::moduleCustomConstant('CUSTOM_AUTHOR');
    }

    /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleVersion()
     */
    public function customModuleVersion(): string
    {
        return self::moduleCustomConstant('CUSTOM_VERSION');
    }

    /**
     * A URL that will provide the latest stable version of this module.
     *
     * @return string
     */
    public function customModuleLatestVersionUrl(): string
    {
        return 'https://raw.githubusercontent.com/' . self::moduleCustomConstant('CUSTOM_AUTHOR') . '/' . self::moduleCustomConstant('GITHUB_REPO') . '/main/latest-version.txt';
    }

    /**
     * {@inheritDoc}
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleSupportUrl()
     */
    public function customModuleSupportUrl(): string
    {
        return self::moduleCustomConstant('CUSTOM_SUPPORT_URL');
    }

    /**
     * Retrieve a required class constant from the concrete module class.
     */
    private static function moduleCustomConstant(string $name): string
    {
        $class = static::class;
        $constant = $class . '::' . $name;

        if (!defined($constant)) {
            throw new \LogicException(sprintf('Missing required constant %s on %s', $name, $class));
        }

        return constant($constant);
    }
}
