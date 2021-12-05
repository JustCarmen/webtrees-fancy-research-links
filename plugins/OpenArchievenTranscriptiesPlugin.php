<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OpenArchievenTranscriptiesPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Open Archieven (zoeken in transcripties)';
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
		return 'https://www.openarch.nl/htr/search.php?q="' . $name['first'] . ' ' . $name['surname'] . '"&lang=' . $language;
	}
}
