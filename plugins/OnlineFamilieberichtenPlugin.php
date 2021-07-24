<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OnlineFamilieberichtenPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Online Familieberichten (' . I18N::translate('link only') . ')';
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
		return 'https://www.online-familieberichten.nl/zoeken.asp';
	}
}
