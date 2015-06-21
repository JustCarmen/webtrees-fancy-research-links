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

class RijksarchiefBelgiePlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Rijksarchief België';
	}

	static function getSearchArea() {
		return 'BEL';
	}

	static function createLink($name) {
		return 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $name['surname'] . '/q/persoon_voornaam_t_0/' . $name['givn'] . '/q/zoekwijze/s?M=0&V=0&O=0&persoon_0_periode_soort=&persoon_0_periode_geen=0';
	}

}
