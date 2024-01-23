<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Fritekstsøgning på for- og efternavn 
 * samt fødselsår i Politiets Registerblade
 * i Københavns Stadsarkiv (kbharkiv.dk).
 */

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class PolRegisterPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Politiets Registerblade';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'DNK';
    }

    public function researchLink($attributes): string
    {
    $name = $attributes['NAME'];
    $year = $attributes['YEAR'];

        return 'https://kbharkiv.dk/brug-samlingerne/soeg-i-indtastede-kilder/results?q1.f=lastname&q1.op=in&q1.t=' . $name['surn'] . '&q2.f=firstnames&q2.op=in&q2.t=' . $name['first'] . '&q3.f=yearOfBirth&q3.op=eq&q3.t=' . $year['BIRT'] .'&sortField=lastname&sortDirection=asc&postsPrPage=20&collections=17&type=advanced';
    }
}