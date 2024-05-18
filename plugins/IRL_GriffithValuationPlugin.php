<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class IRL_GriffithValuationPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Griffith Valuation';
    }

    public function pluginName(): string
    {
        return strtolower(basename(__FILE__, 'Plugin.php'));
    }

    public function researchArea(): string
    {
        return 'IRL';
    }

    public function researchLink($attributes): string
    {
        // This uses the search syntax from the 2023 version of Griffith Valuation site

        $name = $attributes['NAME'];

        return 'https://www.askaboutireland.ie/griffith-valuation/index.xml?action=doNameSearch&familyname='
        . $name['surname'] . '&wildcard=on&firstname='
        . $name['first'] .'&baronyname=&countyname=&unionname=&parishname=';
    }
}
