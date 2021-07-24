<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class WieWasWiePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'WieWasWie';
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
		return 'https://www.wiewaswie.nl/nl/zoeken?q=' . $name['fullNN'];
	}
}
