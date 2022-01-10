<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ErfgoedEnschedePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Erfgoed Enschede';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://collecties.erfgoedenschede.nl/zoeken/groep=Personen%2C%20Akten%20en%20registers/Achternaam=' . $name['surn'] . '/Voornaam=' . $name['givn'] . '/aantalpp=12/?nav_id=0-0';
	}
}
