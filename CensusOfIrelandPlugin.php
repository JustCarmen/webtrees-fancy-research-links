<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CensusOfIrelandPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'National Archives - Census of Ireland';
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
        // This uses the search syntax from the 2023 version of National Archive - Census Search

        $name = $attributes['NAME'];

        return 'http://www.census.nationalarchives.ie/search/results.jsp?searchMoreVisible=true&surname=' . $name['surname'] . '&firstname=' . $name['first'];
    }
}
