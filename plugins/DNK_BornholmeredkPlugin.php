<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Fritekstsøgning på for- og efternavn 
 * samt fødselsår i Bornholmere.dk
 */

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DNK_BornholmeredkPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Bornholmere.dk';
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

        return 'http://bornholmere.dk/search_table.php?s=' . $name['first'] . ' ' . $name['surn'] . ' ' . $year['BIRT'];
    }
}