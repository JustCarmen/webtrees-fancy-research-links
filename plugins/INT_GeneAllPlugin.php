<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_GeneAllPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Geneall ($)';
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

		$name = $attributes['NAME'];

		return 'https://www.geneall.net/' . $language . '/search/?s=' . $name['first'] . ' ' . $name['surname'] . '&t=p';
	}
}
