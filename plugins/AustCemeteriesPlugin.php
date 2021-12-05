<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AustCemeteriesPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Australian Cemeteries';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'AUS';
    }

    public static function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'http://www.austcemindex.com/?given_names=' . $name['givn'] . '&family_name=' . $name['surn'];
    }
}
