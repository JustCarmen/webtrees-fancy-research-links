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

class GrafTombePlugin extends ResearchBasePlugin {

	static function getPluginName() {
		return 'NL | Graftombe';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$surname = $prefix ? $surn . ' ' . $prefix : $surn;
		return $link = 'http://www.graftombe.nl/names/search?forename=' . $givn . '&surname=' . $surname . '&submit=Zoeken&r=names-search';
	}

	static function encode_plus() {
		return true;
	}

}
