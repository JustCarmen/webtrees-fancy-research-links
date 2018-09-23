<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2017 webtrees development team
 * Copyright (C) 2017 JustCarmen
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * This is an example plugin you can modify or use 'as is'. If you want to use this plugin, just copy it to the Plugin folder. *
 * For more information about making your own plugin goto http://www.justcarmen.nl/fancy-modules/fancy-research-links/
 */
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks\Plugin;

use JustCarmen\WebtreesAddOns\FancyResearchLinks\FancyResearchLinksClass;

class CustomGooglePlugin2 extends FancyResearchLinksClass {

	/**
	 * The plugin name is used in the sidebar
	 * 
	 * @return string
	 */
	static function getPluginName() {
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
	static function getSearchArea() {
		return 'INT';
	}

	/**
	 * 
	 * @param array $name
	 * 
	 * - Full name = $name[‘fullname’] eg "John Michael van den Burgh"
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
	static function createLink($name) {
		// "Last First M" YOB
		$fullname = $name['surname'] . ' ' . $name['first'];

		// Extend the fullname with the first letter of the middle name.
		// Extract the substring from position 0 with a length of 1
		// With .= means concatenating the string with the string in the already declared variable $fullname
		if ($name['middle']) {
			$fullname .= ' ' . substr($name['middle'], 0, 1);
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
			$deathplace		 = ' ' . $name['deathplace'];
			// $shortdeathplace is a part of the placename e.g. "Palos Heights"
			$shortdeathplace = ' ' . explode(", ", $name['deathplace'])[0];
		} else {
			$deathplace		 = '';
			$shortdeathplace = '';
		}

		// narrow down the search by using ~genealogy and ~ancestry. Google will only return related searches.
		// put the $fullname variable between double quotes to search the whole name only. Remove the double quotes to search
		// each name part separatly. Maybe in that case don't use the first letter of the middle name (see above).
		// The single quotes are used to escape the variables in the string.
		// The dots are used to concatenate the variables with the previous part.
		return 'https://www.google.com/search?q="' . $fullname . '"' . $deathyear . $shortdeathplace . ' ~genealogy ~ancestry';
	}

	/**
	 * Whether or not the url should be escaped with a '+'. Default is %20
	 * The boolean 'true' is neccessary in this example
	 * 
	 * @return boolean
	 */
	static function encodePlus() {
		return true;
	}

}
