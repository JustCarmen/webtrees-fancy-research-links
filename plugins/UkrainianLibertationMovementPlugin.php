<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class UkrainianLibertationMovementPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Архів Українського визвольного руху (посилання)';
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
        return 'http://avr.org.ua/';
    }
}
