<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class IRL_CivilRegistrationIrelandPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Irish Genealogy - Civil Registration';
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
        // This uses the search syntax from the 2023 version of Civil Records Search

        $name = $attributes['NAME'];

        return 'https://civilrecords.irishgenealogy.ie/churchrecords/civil-perform-search.jsp?namefm=' . $name['first'] . '&namel=' . $name['surname'] . '&type=B&type=M&type=D&submit=Search';
    }
}
