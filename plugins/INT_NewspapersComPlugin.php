<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_NewspapersComPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Newspapers.com ($)';
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

		return 'https://www.newspapers.com/search/#query=%22' . $name['first'] . '+' . $name['surname'] . '%22&dr_year=' . $year['BIRT'] . '-2050&sort=facet_year_month_day+asc%2C+score+desc';
	}
}

