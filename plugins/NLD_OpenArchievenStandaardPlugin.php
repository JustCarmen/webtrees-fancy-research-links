<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_OpenArchievenStandaardPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Open Archieven (standaard zoeken)';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink($attributes): string
    {
		$languages = ['de', 'en', 'fr', 'nl'];

		$language = I18N::languageTag();
		if (!in_array($language, $languages)) {
			$language = 'en';
		}

		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];

		return 'https://www.openarch.nl/search.php?lang=' . $language . '&name=' . $name['fullNN'] . ' ' . $year['BIRT'] . '-' . $year['DEAT'] . '&number_show=10&sort=4';
	}
}
