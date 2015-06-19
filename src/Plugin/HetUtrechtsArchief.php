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
namespace Fisharebest\Webtrees;

class nl_hetutrechtsarchief_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Het Utrechts Archief';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.hetutrechtsarchief.nl/collectie/archiefbank/indexen/personen/' .
			'zoekresultaat?mivast=39&miadt=39&mizig=100&miview=tbl&milang=nl&micols=1&mires=0' .
			'&mip1=' . $surn . '&mip2=' . $prefix . '&mip3=' . $givn;
	}

}
