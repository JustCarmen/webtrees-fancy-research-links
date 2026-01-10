<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_ErfgoedLeidenPlugin extends FancyResearchLinksModule
{
  	public function pluginLabel(): string
    {
		return 'Erfgoed Leiden en omstreken';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink(array $attributes): string
    {
		$name = $attributes['NAME'];
		$voornaam = $name['givn'];
		$achternaam = $name['surn'];

		// Build the array that should eventually be in the URL
		$queryArray = [
			"person_1" => [
				"search_t_voornaam" => $voornaam,
				"search_t_geslachtsnaam" => $achternaam
			]
		];

		// Encode to JSON
		$json = json_encode($queryArray);

		// URL-encode the JSON so it is safe in the URL
		$researchlink = urlencode($json);

		// Build the final URL
		return "https://www.erfgoedleiden.nl/collecties/personen/zoek-op-personen/persons?sa=" . $researchlink;
	}
}
