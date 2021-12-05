<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DeceasedOnlinePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Deceased Online';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'GBR';
	}

	public static function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		
		return 'https://www.deceasedonline.com/servlet/GSDOSearch?' . 'GSDOInptSName=' . $name['surname'] . '&GSDOInptFName=' . $name['first'];
	}
}
