<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ChroniclingAmericaPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Chronicling America';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'USA';;
	}

	public static function researchLink($name, $year): string

    {
		return 'https://chroniclingamerica.loc.gov/search/pages/results/?state=&date1=' . $year['BIRT'] . '&date2=1963&proxtext=' . $name['first'] . '+' . $name['surname'] . '&x=23&y=17&dateFilterType=yearRange&rows=20&searchType=basic&sort=date';
	}
}
