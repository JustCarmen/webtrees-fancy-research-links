<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class IGPPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Ireland Genealogy Projects (IGP)';
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
        // This uses the search syntax from the 2023 version of Free Find, using IGP branding

        $name = $attributes['NAME'];

        return 'https://search.freefind.com/find.html?si=13812782&pid=r&n=0&_charset_=UTF-8&bcd=%C3%B7&query=' . $name['first'] . ' ' . $name['surname'];
    }
}
