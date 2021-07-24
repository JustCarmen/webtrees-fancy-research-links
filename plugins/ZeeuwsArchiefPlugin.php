<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ZeeuwsArchiefPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Zeeuws archief';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'NLD';;
	}

	public static function researchLink($name): string
    {
		return 'https://www.zeeuwsarchief.nl/onderzoek-het-zelf/archief/?mivast=239&miadt=239&mizig=862&miview=tbl&milang=nl' .
		'&micols=1&mip3=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip1=' . $name['givn'];
	}
}
