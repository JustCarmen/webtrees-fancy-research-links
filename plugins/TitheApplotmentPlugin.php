<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class TitheApplotmentPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'National Archives - Tithe Applotment Books';
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
        // This uses the search syntax from the 2023 version of National Archive - Tithe Applotment Books Search

        $name = $attributes['NAME'];

        return 'http://titheapplotmentbooks.nationalarchives.ie/search/tab/results.jsp?surname=' . $name['surname'] . '&firstname=' . $name['first'] . '&county=&parish=&townland=&search=Search';
    }
}
