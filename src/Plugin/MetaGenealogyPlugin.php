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
 */
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks\Plugin;

use JustCarmen\WebtreesAddOns\FancyResearchLinks\FancyResearchLinksClass;

class MetaGenealogyPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Genealogy.net Meta Search';
	}

	static function getSearchArea() {
		return 'DEU';
	}
	
	static function createLink($name) {
		/*
		$place = '';
		if ($name['birthplace']) {
			//$name['birthplace']: Doesn't make sense, if the value contains a hierarchic location.
			$places = explode(',', $name['birthplace']);
			$place = trim($places[0]);
		}
		return "javascript: postform('http://meta.genealogy.net/search/index', { lastname: '" . $name['surname'] . "', placename: '" . $place . "', partner1:'on', partner2:'on', partner3:'on', partner4:'on', partner6:'on', partner8:'on', partner9:'on', partner11:'on', partner12:'on', partner13:'on', partner15:'on', partner16:'on', partner17:'on', partner18:'on', partner19:'on'}, false, true)";
		*/
		// Often it's better to run the search just with the surname.
		// It's a post form, so it will be send by javascript in a new window.
		return "javascript: postform('http://meta.genealogy.net/search/index', { lastname: '" . $name['surname'] . "', placename: '', partner1:'on', partner2:'on', partner3:'on', partner4:'on', partner6:'on', partner8:'on', partner9:'on', partner11:'on', partner12:'on', partner13:'on', partner15:'on', partner16:'on', partner17:'on', partner18:'on', partner19:'on'}, false, true)";
		//
	}

}