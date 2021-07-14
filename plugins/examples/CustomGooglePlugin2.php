<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CustomGooglePlugin2 extends FancyResearchLinksModule
{

  /**
   * The plugin name is used in the sidebar
   *
   * @return string
   */
	public static function pluginLabel(): string
    {
		return 'Google custom 2';
	}

	/**
	 * Determine the search area of the plugin, using the official 3 letter country code
	 * Look in App/Stats.php => public function getAllCountries for the complete list of available codes.
	 * Use 'INT' for 'International'
	 * Leave empty to list the plugin in the category 'Other links'.
	 *
	 * @return string
	 */
	public static function researchArea(): string
    {
		return I18N::translate('International');
	}

	/**
	 *
	 * @param array $name
	 *
	 * - Full name = $name[‘fullNN’] eg "John Michael van den Burgh"
	 * - Full given name = $name[‘givn’] e.g. "John Michael"
	 * - First name = $name[‘first’] e.g. "John"
	 * - Middle name = $name[‘middle’] e.g. "Michael"
	 * - Last name with prefix = $name[‘surname’] e.g. "van den Burgh"
	 * - Last name without prefix = $name[‘surn’] e.g. "Burgh"
	 * - Prefix = $name[‘prefix’] e.g. "van den"
	 * - Birth year = $name[‘birthyear’] e.g. "1800"
	 * - Birth place = $name[‘birthplace’] e.g. "Palos Heights, Cook County, Illinois, USA"
	 * - Death year = $name[‘deathyear’] e.g. "1880"
	 * - Death place = $name[‘deathplace’] e.g. "Palos Heights, Cook County, Illinois, USA"
	 *
	 * @return string
	 */
	public static function researchLink($name): string
    {
		// "Last First M" YOB
		$fullNN = $name['surname'] . ' ' . $name['first'];

		// Extend the fullNN with the first letter of the middle name.
		// Extract the substring from position 0 with a length of 1
		// With .= means concatenating the string with the string in the already declared variable $fullNN
		if ($name['middle']) {
			$fullNN .= ' ' . substr($name['middle'], 0, 1);
		}

		// Use an escape in case the deathyear is empty
		if ($name['deathyear']) {
			$deathyear = ' ' . $name['deathyear'];
		} else {
			$deathyear = '';
		}

		// Use the full deathplace or a short version.
		// [0] is the first part of the full placename, [1] is the second part etc.
		// Use an escape in case the deathplace is emtpy
		if ($name['deathplace']) {
			// $deathplace is the full placename e.g. "Palos Heights, Cook County, Illinois, USA"
			$deathplace = ' ' . $name['deathplace'];
			// $shortdeathplace is a part of the placename e.g. "Palos Heights"
			$shortdeathplace = ' ' . explode(", ", $name['deathplace'])[0];
		} else {
			$deathplace      = '';
			$shortdeathplace = '';
		}

		// narrow down the search by using ~genealogy and ~ancestry. Google will only return related searches.
		// put the $fullNN variable between double quotes to search the whole name only. Remove the double quotes to search
		// each name part separatly. Maybe in that case don't use the first letter of the middle name (see above).
		// The single quotes are used to escape the variables in the string.
		// The dots are used to concatenate the variables with the previous part.
		return 'https://www.google.com/search?q="' . $fullNN . '"' . $deathyear . $shortdeathplace . ' ~genealogy ~ancestry';
	}
}
