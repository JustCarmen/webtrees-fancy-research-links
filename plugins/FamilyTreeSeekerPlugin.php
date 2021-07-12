<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FamilyTreeSeekerPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Familytreeseeker';
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
		return 'https://familytreeseeker.com/search.php?l=en&fn=' . strtolower($name['givn']) . '&sn=' . strtolower($name['surname']) . '&m=1&bd1=0&bd2=0&bp=&t=1&submit=Search';
	}

	public static function encodePlus() {
		return true;
	}
}
