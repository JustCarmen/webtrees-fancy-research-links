<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class VoorouderPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Voorouder.nl';
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
		return 'https://genealogie.voorouder.nl/search.php?mybool=AND&nr=50&showdeath=yes&showspouse=yes&mylastname=' . $name['surname'] . '&lnqualify=equals&myfirstname=' . $name['givn'] . '&fnqualify=contains';
	}
}
