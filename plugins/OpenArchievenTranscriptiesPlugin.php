<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OpenArchievenTranscriptiesPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Open Archieven (zoeken in transcripties)';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';;
	}

	public function researchLink($attributes): string
    {
		$languages = ['de', 'en', 'fr', 'nl'];

		$language = I18N::languageTag();
		if (!in_array($language, $languages)) {
			$language = 'en';
		}

		$name = $attributes['NAME'];

		return 'https://www.openarch.nl/htr/search.php?q="' . $name['first'] . ' ' . $name['surname'] . '"&lang=' . $language;
	}
}
