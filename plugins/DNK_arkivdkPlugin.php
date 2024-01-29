<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Søgning på navn i arkiv.dk
 * Søger kun på billeder.
 */

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DNK_arkivdkPlugin extends FancyResearchLinksModule
{
  	public function pluginLabel(): string
    {
		return 'arkiv.dk (navn)';
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
        
		return 'https://arkiv.dk/soeg?billeder=true&searchstring="' . $name['fullNN'] . '"';
	}
}