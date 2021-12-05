<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GenealogieOnlinePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Genealogie Online';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'NLD';;
	}

	public static function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$place = $attributes['PLACE'];

		return 'https://www.genealogieonline.nl/zoeken/?q=' . $name['surname'] . '&vn=' . $name['givn'] . '&pn=' . $place['BIRT'];
	}
}
