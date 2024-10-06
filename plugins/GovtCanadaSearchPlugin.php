<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GovtCanadaSearchPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Canada Library and Archives';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'CAN';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];

		return 'https://recherche-collection-search.bac-lac.gc.ca/eng/Home/Search?q=' . $name['surname'] . '&DateBucket=%7C' . $year['BIRT'] . '-' . $year['DEAT'] . '&';
	}
}
