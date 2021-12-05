<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OpenArchievenStandaardPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Open Archieven (standaard zoeken)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'NLD';;
	}

	public static function researchLink($name, $year, $place): string
    {
		$languages = ['de', 'en', 'fr', 'nl'];

		$language = I18N::languageTag();
		if (!in_array($language, $languages)) {
			$language = 'en';
		}
		return 'https://www.openarch.nl/search.php?lang=' . $language . '&name=' . $name['fullNN'] . ' ' . $year['BIRT'] . '-' . $year['DEAT'] . '&number_show=10&sort=4';
	}
}
