<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class UkrainianLibertationMovementPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Архів Українського визвольного руху (посилання)';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'UKR';
    }

    public function researchLink($attributes): string
    {
		return 'http://avr.org.ua/';
    }
}
