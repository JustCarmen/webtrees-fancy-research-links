<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class StamboomZoekerPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Stamboomzoeker';
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
		return 'https://stamboomzoeker.nl/search.php?l=nl&fn=' . strtolower($name['givn']) . '&sn=' . strtolower($name['surname']) . '&m=1&bd1=0&bd2=0&bp=&t=1&submit=Zoeken';
	}

	public static function encodePlus() {
		return true;
	}
}
