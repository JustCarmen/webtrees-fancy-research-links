<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CustomGooglePlugin1 extends FancyResearchLinksModule
{

  /**
   * The plugin name is used in the sidebar
   *
   * @return string
   */
	public static function pluginLabel(): string
    {
		return 'Google custom 1';
	}

	/**
	 * Set the search area of the plugin with the official 3 letter country code.
	 * Look at the function getAllCountries in app\Statistics\Service\CountryService.php for the complete list of available codes.
	 * Use 'INT' for 'International'
	 *
	 * @return string
	 */
	public static function researchArea(): string
    {
		return 'INT';
	}

	/**
	 *
	 * @param array $name
	 *
	 * - Full name = $name[‘fullNN’] eg "John Michael van den Burgh"
	 * - Full given name = $name[‘givn’] e.g. "John Michael"
	 * - First name = $name[‘first’] e.g. "John"
	 * - Last name with prefix = $name[‘surname’] e.g. "van den Burgh"
	 * - Last name without prefix = $name[‘surn’] e.g. "Burgh"
	 * - Prefix = $name[‘prefix’] e.g. "van den"
	 * - Birth year = $birth[‘year’] e.g. "1800"
	 * - Birth place = $birth[‘place’] e.g. "Palos Heights, Cook County, Illinois, USA"
	 * - Death year = $death[‘year’] e.g. "1880"
	 * - Death place = $death[‘place’] e.g. "Palos Heights, Cook County, Illinois, USA"
	 *
	 * @return string
	 */
	public static function researchLink($name, $birth, $death): string
    {
		// "First M Last" YOB
		$fullNN = $name['first'];

		// Extend the firstname with the first letter of the middle name.
		// Extract the substring from position 0 with a length of 1
		// With .= means concatenating the string with the string in the already declared variable $fullNN
		if ($name['middle']) {
			$fullNN .= ' ' . substr($name['middle'], 0, 1);
		}

		// Concatenate the surname to the variable $fullNN that already holds the string "First M"
		$fullNN .= ' ' . $name['surname'];

		// Use an escape in case the birthyear is empty
		if ($birth['year']) {
			$birthyear = ' ' . $birth['year'];
		} else {
			$birthyear = '';
		}

		// Use the full birthplace or a short version.
		// [0] is the first part of the full placename, [1] is the second part etc.
		// Use an escape in case the deathplace is emtpy
		if ($birth['place']) {
			// $birthplace is the full placename e.g. "Palos Heights, Cook County, Illinois, USA"
			$birthplace = ' ' . $name['birthplace'];
			// $shortbirthplace is a part of the placename e.g. "Palos Heights"
			$shortbirthplace = ' ' . explode(", ", $death['place'])[0];
		} else {
			$birthplace      = '';
			$shortbirthplace = '';
		}

		// narrow down the search by using ~genealogy and ~ancestry. Google will only return related searches.
		// put the $fullNN variable between double quotes to search the whole name only. Remove the double quotes to search
		// each name part separatly. Maybe in that case don't use the first letter of the middle name (see above).
		// The single quotes are used to escape the variables in the string.
		// The dots are used to concatenate the variables with the previous part.
		return 'https://www.google.com/search?q="' . $fullNN . '"' . $birthyear . $birthplace . ' ~genealogy ~ancestry';
	}
}
