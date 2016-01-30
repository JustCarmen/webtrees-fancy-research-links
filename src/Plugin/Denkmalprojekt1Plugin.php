<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * Copyright (C) 2015 JustCarmen
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

class Denkmalprojekt1Plugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Denkmalprojekt (eigene Suche)';
	}

	static function getSearchArea() {
		return 'DEU';
	}

	static function createLink($name) {
		$values = array(strtoupper($name['surname']), ucfirst($name['first']));
		$query = implode('+', array_filter($values, function($v){ return $v !== null && $v !== ''; }));

		return "http://www.denkmalprojekt.org/search/search.pl?Match=0&Realm=All&Terms=%22$query%22";
	}

	static function encodePlus() {
		return false;
	}

}
