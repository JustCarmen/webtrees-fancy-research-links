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
namespace JustCarmen\WebtreesAddOns\Module\FancyResearchLinks\Plugin;

use JustCarmen\WebtreesAddOns\Module\FancyResearchLinks\ResearchBasePlugin;

class RijksarchiefBelgiePlugin extends ResearchBasePlugin {

	static function getPluginName() {
		return 'BE | Rijksarchief België';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = '#';
	}

	static function createSublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = array(
			array(
				'title'	 => I18N::translate('birth'),
				'link'	 => 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $surname . '/q/persoon_voornaam_t_0/' . $givn . '/q/zoekwijze/s?M=0&amp;V=0&amp;O=1&amp;persoon_0_periode_soort=geboorte&persoon_0_periode_geen=0'
			),
			array(
				'title'	 => I18N::translate('death'),
				'link'	 => 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $surname . '/q/persoon_voornaam_t_0/' . $givn . '/q/zoekwijze/s?M=0&amp;V=0&amp;O=1&amp;persoon_0_periode_soort=overlijden&persoon_0_periode_geen=0'
			)
		);
	}

}
