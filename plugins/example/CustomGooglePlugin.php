<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CustomGooglePlugin extends FancyResearchLinksModule
{

  /**
   * The plugin name is used in the sidebar
   *
   * @return string
   */
	public static function pluginLabel(): string
    {
		return 'Google custom search';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
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
	 * - Birth place = $birth[‘place’] e.g. "Chigaco"
	 * - Death year = $death[‘year’] e.g. "1880"
	 * - Death place = $death[‘place’] e.g. "Chigaco"
	 *
	 * @return string
	 */
	public static function researchLink($name, $birth, $death): string
    {
		// "First M Last" YOB
		$searchname = $name['first'];

		// Extend the firstname with the first letter of the middle name.
		// First seperate the first name from the second part of the given name
		// Extract the substring (the first letter of the middlename) from position 0 with a length of 1
		// With .= means concatenating the string with the string in the already declared variable $searchname
		$middlename = trim(str_replace($name['first'], '', $name['givn']));
		$searchname .= ' ' . substr($middlename, 0, 1);

		// Concatenate the surname to the variable $searchname that already holds the string "First M"
		$searchname .= ' ' . $name['surname'];

		// The variable birth['year']/birth['place] (or death['year']/death['place']) returns an empty string when the date/place
		// is unknown so it is not neccessary to use an escape, but if the string is empty we do not need the preceding space.
		// This might not be a problem in a googlesearch but it can be a problem with other research websites.
		// In this case it is better to add the space to the variable. You can replace $birth with $death in this example.
		$year = $birth['year'];
		if ($year <> '') { // if $year is not empty
			$year = ' ' . $year;
		}
		$place = $birth['place'];
		if ($place <> '') { // if $place is not empty
			$place = ' ' . $place;
		}

		// Narrow the search by using ~genealogy and/or ~ancestry. Google will return only related searches.
		// Enclose the variable $searchname in double quotes to search only the entire name. Remove the double quotes to search
		// each name part separately. In this case, it may be better to exclude the first letter of the middle name (see above).
		// The single quotes are used to escape the variables in the string. Use spaces in the string where appropriate.
		// The dots are used to concatenate the variables with the previous part.
		// Of course, birth year/place of birth and death year/place of death are replaceable in this example.
		return 'https://www.google.com/search?q="' . $searchname . '"' . $year . $place . ' ~genealogy ~ancestry';
	}
}
