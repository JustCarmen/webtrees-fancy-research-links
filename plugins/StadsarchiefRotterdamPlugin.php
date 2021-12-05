<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class StadsarchiefRotterdamPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Stadsarchief Rotterdam';
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

		return 'https://stadsarchief.rotterdam.nl/zoek-en-ontdek/stamboom/zoeken-op-personen/?mivast=184&miadt=184' .
		'&mizig=100&miview=tbl&milang=nl&micols=1&mip1=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip3=' . $name['givn'];
	}
}
