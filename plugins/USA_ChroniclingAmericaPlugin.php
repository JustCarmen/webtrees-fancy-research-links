<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class USA_ChroniclingAmericaPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Chronicling America';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'USA';
	}

	public function researchLink($attributes): string

    {
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];

		return 'https://chroniclingamerica.loc.gov/search/pages/results/?state=&date1=' . $year['BIRT'] . '&date2=1963&proxtext=' . $name['first'] . '+' . $name['surname'] . '&x=23&y=17&dateFilterType=yearRange&rows=20&searchType=basic&sort=date';
	}
}
