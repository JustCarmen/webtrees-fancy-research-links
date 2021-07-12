<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class Denkmalprojekt1Plugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Denkmalprojekt (eigene Suche)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Germany');;
	}

	public static function researchLink($name): string
    {
		$values = [strtoupper($name['surname']), ucfirst($name['first'])];
		$query  = implode('+', array_filter($values, function ($v) {
			return $v !== null && $v !== '';
		}));

		return "http://www.denkmalprojekt.org/search/search.pl?Match=0&Realm=All&Terms=%22$query%22";
	}

	public static function encodePlus() {
		return false;
	}
}
