<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RijckheytPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Rijckheyt';
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
		$year = $attributes['YEAR'];

		return 'https://www.rijckheyt.nl/archief/resultaat?mivast=62&miadt=62&mizig=100&miview=tbl&milang=nl&micols=1&mip1=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip3=' . $name['givn'] . '&mibj=' . $year['BIRT'];
	}
}
