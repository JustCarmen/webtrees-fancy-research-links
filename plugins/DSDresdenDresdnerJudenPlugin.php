<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DSDresdenDresdnerJudenPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Dokumentationsstelle Dresden - Juden in Dresden 1933-1945';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'DEU';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://www.stsg.de/cms/dresdner-juden?suchwort=' . $name['surn'] . '&beginn=Beginn+des+Namens';
    }
}
