<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NationalArchivesOfAustraliaPlugin extends FancyResearchLinksModule
{

	public static function pluginLabel(): string
	{
		return 'National Archives of Australia (' . I18N::translate('link only') . ')';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
	{
		return I18N::translate('Australia');
	}

	public static function researchLink($name): string
    {
		return "https://recordsearch.naa.gov.au";
	}

}
