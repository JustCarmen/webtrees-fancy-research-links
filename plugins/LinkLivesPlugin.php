<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Søgning på for- og efternavn samt fødselsår 
 * og -sted i LinkLives (link-lives.dk).
 */

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class LinkLivesPlugin extends FancyResearchLinksModule
{
  	public function pluginLabel(): string
    {
		return 'Link-Lives';
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
	  $place = $attributes['PLACE'];

		return 'https://link-lives.dk/soeg/results?firstName=' . $name['givn'] . '&lastName=' . $name['surn'] . '&birthYear=' . $year['BIRT'] . '&birthPlace=' . $place['BIRT'] . '&index=pas,lifecourses&sortBy=relevance&sortOrder=desc&mode=default&pg=1&size=50';
	}
}