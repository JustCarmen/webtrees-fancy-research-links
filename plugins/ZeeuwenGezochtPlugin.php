<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ZeeuwenGezochtPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Zeeuwen Gezocht';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');;
	}

	public static function researchLink($name): string
    {
		return 'http://www.zeeuwengezocht.nl/nl/zoeken?mivast=1539&miadt=239&mizig=862&miview=tbl&milang=nl&micols=1&mires=0&mip3='
		. $name['surn'] . '&mip2=' . $name['prefix'] . '&mip1=' . $name['givn'];
	}
}
