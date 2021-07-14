<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FamilySearchPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Family Search';
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
		return 'https://www.familysearch.org/search/record/results?q.givenName=' . $name['givn'] . '&q.surname=' . $name['surname'];
	}
}
