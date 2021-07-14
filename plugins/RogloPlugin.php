<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RogloPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Roglo';
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
		$languages = ['af', 'bg', 'br', 'ca', 'cs', 'da', 'de', 'es', 'et', 'fi', 'fr', 'he', 'is', 'it', 'lv', 'nl', 'pl', 'pt', 'ro', 'ru', 'sl', 'sv', 'zh'];

		$locale = I18N::languageTag();
		switch ($locale) {
			case 'pt-BR':
				$language = 'br';
				break;
			case 'fr-CA':
				$language = 'fr';
				break;
			case 'zh-Hans':
				$language = 'zh';
				// no break
			default:
				$language = $locale;
		}

		if (!in_array($language, $languages)) {
			$language = 'en';
		}

		return 'http://roglo.eu/roglo?lang=' . $language . '&m=NG&n=' . $name['fullNN'] . '&t=PN';
	}
}
