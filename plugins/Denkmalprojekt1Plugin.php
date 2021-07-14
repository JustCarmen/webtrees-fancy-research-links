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
		$values = [strtoupper($name['surn']), ucfirst($name['first'])];
		$query  = implode('+', array_filter($values, function ($v) {
			return $v !== null && $v !== '';
		}));

		return "http://www.denkmalprojekt.org/search/renamed-search.pl?Match=0&Realm=All&Terms=" . e($query);
	}
}
