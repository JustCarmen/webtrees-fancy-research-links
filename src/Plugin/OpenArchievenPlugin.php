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

class OpenArchievenPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Open Archieven';
	}

	static function getSearchArea() {
		return 'NLD';
	}

	static function createLink($name) {
		$languages = array('de', 'en', 'fr', 'nl');
		
		$language = WT_LOCALE;
		if (!in_array($language, $languages)) {
			$language = 'en';
		}
		return 'https://www.openarch.nl/search.php?lang=' . $language . '&name=' . $name['fullname'] . '&number_show=10&sort=1';
	}

	static function encodePlus() {
		return true;
	}

}
