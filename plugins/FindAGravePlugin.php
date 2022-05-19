<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FindAGravePlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Find a Grave';
    }

    public function pluginName(): string
    {
        return strtolower(basename(__FILE__, 'Plugin.php'));
    }

    public function researchArea(): string
    {
        return 'INT';
    }

    public function researchLink($attributes): string
    {
        // This uses the search syntax from the 2022 version of FindaGrave
        // birth and death ± 1 in case webtrees entry is an estimate

        $name = $attributes['NAME'];
        $year = $attributes['YEAR'];

        return 'https://www.findagrave.com/memorial/search?' .
           'firstname='         . $name['first'] .
           '&lastname='         . $name['surname'] .
           '&birthyear='        . $year['BIRT'] .
           '&birthyearfilter=1' .
           '&deathyear='        . $year['DEAT'] .
           '&deathyearfilter=1';
    }
}
