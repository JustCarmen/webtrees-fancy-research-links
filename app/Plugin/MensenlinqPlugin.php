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

class MensenlinqPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Mensenlinq';
	}

	static function getSearchArea() {
		return 'NLD';
	}

	static function createLink($name) {
		return 'https://www.mensenlinq.nl/site/advertentie/overzicht?advzoek_vandag=01&advzoek_vanmaand=01&advzoek_vanjaar=2006&advzoek_totdag=' . date("d") . '&advzoek_totmaand=' . date("m") . '&advzoek_totjaar=' . date("Y") . '&advzoek_dag=' . date("d") . '&advzoek_maand=' . date("m") . '&advzoek_jaar=' . date("Y") . '&advzoek_provincie=&advzoek_titel=&advzoek_zoek=' . $name['surname'] . '&advzoek_plaats=&advzoek_voornaam=' . $name['first'] . '&advzoek_geboorteplaats=';
	}

}
