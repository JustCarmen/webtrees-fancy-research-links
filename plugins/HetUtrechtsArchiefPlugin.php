<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class HetUtrechtsArchiefPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Het Utrechts Archief';
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

		return 'https://www.hetutrechtsarchief.nl/collectie/archiefbank/indexen/personen/' .
		'zoekresultaat?mivast=39&miadt=39&mizig=100&miview=tbl&milang=nl&micols=1&mires=0' .
		'&mip1=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip3=' . $name['givn'];
	}
}
