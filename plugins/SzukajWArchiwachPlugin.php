<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class SzukajWArchiwachPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Szukaj w Archiwach (tylko link)';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'POL';
    }

    public function researchLink($attributes): string
    {
		return 'https://www.szukajwarchiwach.gov.pl/';
    }
}
