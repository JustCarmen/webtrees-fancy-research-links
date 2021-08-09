<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DSDresdenDresdnerJudenPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Dokumentationsstelle Dresden - Juden in Dresden 1933-1945';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'DEU';
    }

    public static function researchLink($name): string
    {
        return 'https://www.stsg.de/cms/dresdner-juden?suchwort=' . $name['givn'] . '&beginn=Beginn+des+Namens';
    }
}
