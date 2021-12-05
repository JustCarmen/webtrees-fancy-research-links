<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class BillionGravesPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Billion Graves';
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

		return 'https://billiongraves.com/search/results?given_names=' .
		$name['givn'] . '&family_names=' . $name['surname'] . '&birth_year=' . $year['BIRT'] .
		'&death_year=' . $year['DEAT'] . '&year_range=5';
	}
}
