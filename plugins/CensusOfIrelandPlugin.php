<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CensusOfIrelandPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'National Archives - Census of Ireland - Advanced Search (link only)';
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
        // This is a link to the search Census page of the 2023 version of National Archive - Census Search
        
        return 'http://www.census.nationalarchives.ie/search/#searchmore';
    }
}
