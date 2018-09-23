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
 *
 * This is an example plugin you can modify or use 'as is'. If you want to use this plugin, just copy it to the Plugin folder. *
 * For more information about making your own plugin goto http://www.justcarmen.nl/fancy-modules/fancy-research-links/
 */
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks\Plugin;

use JustCarmen\WebtreesAddOns\FancyResearchLinks\FancyResearchLinksClass;

class DeutscheNationalbibliothekPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Deutsche Nationalbibliothek';
	}

	static function getSearchArea() {
		return 'DEU';
	}

	static function createLink($name) {
		$values	 = [$name['surname'], $name['first']];
		$query	 = implode('+', array_filter($values, function($v) { return $v !== null && $v !== ''; }));
		return 'https://portal.dnb.de/opac.htm?query=' . $query . '&method=simpleSearch';
	}

	static function encodePlus() {
		return false;
	}

}
