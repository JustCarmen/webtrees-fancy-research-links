<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DEU_Denkmalprojekt1Plugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Denkmalprojekt (eigene Suche)';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'DEU';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		$values = [strtoupper($name['surn']), ucfirst($name['first'])];
		$query  = implode('+', array_filter($values, function ($v) {
			return $v !== null && $v !== '';
		}));

		return "http://www.denkmalprojekt.org/search/RWDsearch.pl?Match=0&Realm=All&Terms=" . e($query);
	}
}
