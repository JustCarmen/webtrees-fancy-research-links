<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NationalArchivesOfAustraliaPlugin extends FancyResearchLinksModule
{

	public function pluginLabel(): string
	{
		return 'National Archives of Australia (' . I18N::translate('link only') . ')';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
	{
		return 'AUS';
	}

	public function researchLink($attributes): string
    {
		return "https://recordsearch.naa.gov.au";
	}

}
