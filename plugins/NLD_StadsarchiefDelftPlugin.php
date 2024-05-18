<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_StadsarchiefDelftPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Stadsarchief Delft';
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

		return 'https://zoeken.stadsarchiefdelft.nl/zoeken/groep=Personen/Voornaam=' . $name['first'] .
        '/Tussenvoegsel=' . $name['prefix'] . '/Achternaam=' . $name['surn'];
	}
}
