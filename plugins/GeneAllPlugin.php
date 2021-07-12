<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GeneAllPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Geneall($)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('International');
	}

	public static function researchLink($name): string
    {
		$languages = [
			'de'    => 'de',
			'en_GB' => 'en',
			'en_US' => 'en',
			'fr'    => 'fr',
			'it'    => 'it',
			'es'    => 'es',
			'pt'    => 'pt',
			'pt_BR' => 'pt',
		];

		$locale = I18N::languageTag();
		if (isset($languages[$locale])) {
			$language = $languages[$locale];
		} else {
			$language = $languages['en_US'];
		}

		return 'https://www.geneall.net/' . $language . '/search/?s=' . $name['first'] . ' ' . $name['surname'] . '&t=p';
	}

	public static function encodePlus() {
		return true;
	}
}
