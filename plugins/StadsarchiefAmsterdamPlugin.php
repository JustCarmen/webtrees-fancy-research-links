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
		return 'https://archief.amsterdam/indexen/persons?sa=%7B%22person_1%22:%7B%22search_t_geslachtsnaam%22:%22' .
		$name['surn'] . '%22,%22search_t_tussenvoegsel%22:%22' . $name['prefix'] . '%22,%22search_t_voornaam%22:%22' .
		$name['givn'] . '%22%7D%7D';
	}
}
