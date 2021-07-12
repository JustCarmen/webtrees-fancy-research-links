<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OnlineFamilieberichtenPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Online Familieberichten';
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
		return 'https://www.online-familieberichten.nl/zoeken.asp?sortpers=naam&command=zoekformres&achternaam=' . $name['surn'] . '&tussenvoegsel=' . $name['prefix'] . '&voornaam=' . $name['first'];
	}

	public static function encodePlus() {
		return true;
	}
}
