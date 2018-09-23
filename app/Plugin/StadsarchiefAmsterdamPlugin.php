<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2018 JustCarmen (http://justcarmen.nl)
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
 */
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks\Plugin;

use JustCarmen\WebtreesAddOns\FancyResearchLinks\FancyResearchLinksClass;

class StadsarchiefAmsterdamPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Stadsarchief Amsterdam';
	}

	static function getSearchArea() {
		return 'NLD';
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
	static function createLink($name) {
		return 'https://archief.amsterdam/indexen/archiefkaarten_1939-1994/zoek/query.nl.pl?i1=1&v1=' . $name['givn'] . '&a1=' . $name['surn'] . '&x=0&z=b';
	}
}
