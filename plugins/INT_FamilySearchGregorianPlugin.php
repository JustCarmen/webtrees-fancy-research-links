<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_FamilySearchGregorianPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'FamilySearch Gregorian dates';
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
        $name = $attributes['NAME'];
        $year = $attributes['YEAR'];
        $plac = $attributes['COUNTRY'];

        $bf = ((int)$year['BIRT_gregorian']) < 1000 ? '' : (int)$year['BIRT_gregorian']-1;
        $bt = ((int)$year['BIRT_gregorian']) < 1000 ? '' : (int)$year['BIRT_gregorian']+1;
        $df = ((int)$year['DEAT_gregorian']) < 1000 ? '' : (int)$year['DEAT_gregorian']-1;
        $dt = ((int)$year['DEAT_gregorian']) < 1000 ? '' : (int)$year['DEAT_gregorian']+1;

        return 'https://www.familysearch.org/search/record/results' .
           '?q.givenName='    		. $name['givn']    .
           '&q.surname='      		. $name['surname'] . '%20' . $name['msurname'] .
           '&count=100'             .
           '&q.birthLikeDate.from=' . $bf .
           '&q.birthLikeDate.to='   . $bt .
           '&q.deathLikeDate.from=' . $df .
           '&q.deathLikeDate.to='   . $dt .
           '&q.birthLikePlace='     . $plac['BIRT']   .
           '&q.deathLikePlace='     . $plac['DEAT'];
    }
}
