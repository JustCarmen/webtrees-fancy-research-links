<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class VoorouderPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Voorouder.nl';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';;
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://genealogie.voorouder.nl/search.php?mybool=AND&nr=50&showdeath=yes&showspouse=yes&mylastname=' . $name['surname'] . '&lnqualify=equals&myfirstname=' . $name['givn'] . '&fnqualify=contains';
	}
}
