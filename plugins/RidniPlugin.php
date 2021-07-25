<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RidniPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Рідні';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'UKR';
    }

    public static function researchLink($name): string
    {
        return 'https://ridni.org/karta/' . $name['surn'];
    }
}
