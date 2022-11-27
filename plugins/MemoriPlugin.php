<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class MemoriPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Memori.nl';
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
		$name = $attributes['NAME'];
		$place = $attributes['PLACE'];
		
		$searchname = str_replace('%20','+', urlencode($name['fullNN']));
		if(!empty($place['DEAT'])) {
			$searchplace = '&stad=' . str_replace('%20','+', urlencode($place['DEAT']));
		}
		else {
			$searchplace = '';
		}
		return 'https://www.memori.nl/gedenkplaats/overzicht?zoekterm=' . $searchname . $searchplace;
	}
}
