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

class int_geneall_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Geneall | $';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		// this plugin needs refactoring. Multiple websites for multiple country categories. Not on a per language base. See: http://www.geneall.net/site/home.php
		$languages = array(
			'de'	 => 'D',
			'en_GB'	 => 'U',
			'en_US'	 => 'U',
			'fr'	 => 'F',
			'it'	 => 'I',
			'es'	 => 'H',
			'pt'	 => 'P',
			'pt_BR'	 => 'P',
		);

		if (isset($languages[WT_LOCALE])) {
			$language = $languages[WT_LOCALE];
		} else {
			$language = $languages['en_US'];
		}

		return $link = 'http://www.geneall.net/' . $language . '/per_search.php?s=' . $fullname . '&s_type=per_search.php';
	}

	static function encode_plus() {
		return true;
	}

}
