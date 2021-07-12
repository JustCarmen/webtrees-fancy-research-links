<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class StadsarchiefAmsterdamPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Stadsarchief Amsterdam';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');;
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
		return 'https://archief.amsterdam/indexen/archiefkaarten_1939-1994/zoek/query.nl.pl?i1=1&v1=' . $name['givn'] . '&a1=' . $name['surn'] . '&x=0&z=b';
	}
}
