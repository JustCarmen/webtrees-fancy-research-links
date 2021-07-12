<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DigitaleStamboomPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Digitale Stamboom';
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
		return 'http://www.digitalestamboom.nl/search.aspx?lang=nl&verder=' . $name['givn'] . urlencode('||') . $name['prefix'] . urlencode('|') . $name['surn'];
	}

	public static function encodePlus() {
		return true;
	}
}
