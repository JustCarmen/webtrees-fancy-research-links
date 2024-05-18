<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GBR_SocietyofGenealogistsPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Society of Genealogists ($)';
    }

    public function pluginName(): string
    {
        return strtolower(basename(__FILE__, 'Plugin.php'));
    }

    public function researchArea(): string
    {
        return 'GBR';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];
        $year = $attributes['YEAR'];

        $bf = ((int)$year['BIRT']) < 1000 ? '' : (int)$year['BIRT']-1;
        $dt = ((int)$year['DEAT']) < 1000 ? '' : (int)$year['DEAT']+1;

        return 'https://sogdata.org.uk/bin/simplesearchsummarycat.php?mode=q' .
           '&firstname='        . $name['givn']    .
           '&surname='          . $name['surname'] .
           '&from='             . $bf              .
           '&to='               . $dt              .
           '&searchcategory=default'               .
           '&searchtype=soundex';
    }
}
