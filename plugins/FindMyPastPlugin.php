<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FindMyPastPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Findmypast($)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('International');
	}

	public static function researchLink($name): string
    {
		return 'https://search.findmypast.com/search/world-records?firstname=' . $name['givn'] . '&firstname_variants=true&lastname=' . $name['surname'];
	}
}
