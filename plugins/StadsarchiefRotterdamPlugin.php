<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class StadsarchiefRotterdamPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Stadsarchief Rotterdam';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';;
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://stadsarchief.rotterdam.nl/zoek-en-ontdek/stamboom/zoeken-op-personen/?mivast=184&miadt=184' .
		'&mizig=100&miview=tbl&milang=nl&micols=1&mip1=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip3=' . $name['givn'];
	}
}
