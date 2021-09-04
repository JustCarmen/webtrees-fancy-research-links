<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class StadsarchiefDelftPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Stadsarchief Delft';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'NLD';;
	}

	/**
	 *
	 * @param type $name
	 * @return type
	 *
	 * Searching through all indexes of the archives of Amsterdam.
	 * The url is the link to the first index in the list, but all indexes will be listed
	 *
	 */
	public static function researchLink($name): string
    {
		return 'https://zoeken.stadsarchiefdelft.nl/zoeken/groep=Personen/Voornaam=' . $name['first'] .
        '/Tussenvoegsel=' . $name['prefix'] . '/Achternaam=' . $name['surn'];
	}
}
