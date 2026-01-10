<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CustomGooglePlugin extends FancyResearchLinksModule
{

	/**
	* The plugin label is used in the sidebar
	*
	* @return string
	*/
	public function pluginLabel(): string
	{
		return 'Google custom search';
	}

	/**
	* The plugin name is the internal name and is generated automatically
	*
	* @return string
	*/
	public function pluginName(): string
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
	public function researchArea(): string
    {
		return 'INT';
	}

	/**
	 *
	 * @param array $attributes
	 *
	 * $name = $attributes['NAME'];
	 * $year = $attributes['YEAR'];
	 * $place = $attributes['PLACE'];
	 * $country = $attributes['COUNTRY'];
	 *
	 * - Full name 						= $name['fullNN'] 	e.g. "John Michael van den Burgh"
	 * - Full given name 				= $name['givn'] 	e.g. "John Michael"
	 * - First name 					= $name['first'] 	e.g. "John"
	 * - Last name with prefix 			= $name['surname'] 	e.g. "van den Burgh"
	 * - Last name without prefix 		= $name['surn'] 	e.g. "Burgh"
	 * - Prefix 						= $name['prefix'] 	e.g. "van den"
	 * - Married name					= $name['msurname'] e.g. "de Vries"
	 *
	 * - Birth year/place/country		= $year['BIRT'] e.g. "1800" / $place['BIRT']	e.g. "Chicago" / $country['BIRT'] e.g. "USA"
	 * - Christening year/place/country	= $year['CHR']	e.g. "1800" / $place['CHR'] 	e.g. "Chicago" / $country['CHR'] e.g. "USA"
	 * - Baptism year/place/country		= $year['BAPM']	e.g. "1800" / $place['BAPM']	e.g. "Chicago" / $country['BAPM'] e.g. "USA"
	 *
	 * - Death year/place/country		= $year['DEAT'] e.g. "1880" / $place['DEAT']	e.g. "New York" / $country['DEAT'] e.g. "USA"
	 * - Burial year/place/country		= $year['BURI']	e.g. "1880" / $place['BURI']	e.g. "New York" / $country['BURI'] e.g. "USA"
	 * - Cremation year/place/country	= $year['CREM']	e.g. "1880" / $place['CREM']	e.g. "New York" / $country['CREM'] e.g. "USA"
	 *
	 * The module also supports other calendar dates. Add them as a suffix to the event, e.g.:
	 * $year['BIRT_julian' ], $year['DEAT_jewish'], $year['BURI_french'], $year['BAPM__hijri'], $year['CHR_jalali']
	 * You don't need to use a suffix for the default Gregorian calendar.
	 *
	 * @return string
	 */
	public function researchLink($attributes): string
	{
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];
		$place = $attributes['PLACE'];

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

		// The variable $year[]/$place[] returns an empty string when the date/place is unknown so it is not neccessary
		// to use an escape, but if the string is empty we do not need the preceding space.
		// This might not be a problem in a googlesearch but it can be a problem with other research websites.
		// In this case it is better to add the space to the variable. You can replace the 'BIRT'-event in this example
		// with the event you need.
		$year = $year['BIRT'];
		if ($year <> '') { // if $year is not empty
			$year = ' ' . $year;
		}
		$place = $place['BIRT'];
		if ($place <> '') { // if $place is not empty
			$place = ' ' . $place;
		}

		// Narrow the search by using ~genealogy and/or ~ancestry. Google will return only related searches.
		// Enclose the variable $searchname in double quotes to search only the entire name. Remove the double quotes to search
		// each name part separately. In this case, it may be better to exclude the first letter of the middle name (see above).
		// The single quotes are used to escape the variables in the string. Use spaces in the string where appropriate.
		// The dots are used to concatenate the variables with the previous part.
		// Of course, birth year/place of birth and death year/place of death are replaceable in this example.
		$name = $attributes['NAME'];

		return 'https://www.google.com/search?q="' . $searchname . '"' . $year . $place . ' ~genealogy ~ancestry';
	}
}
