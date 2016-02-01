<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2016 webtrees development team
 * Copyright (C) 2016 JustCarmen
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

class Denkmalprojekt2Plugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Denkmalprojekt (Google)';
	}

	static function getSearchArea() {
		return 'DEU';
	}

	static function createLink($name) {
		return 'https://www.google.de/search?hl=de&as_q=' . $name['surname'] . '&as_epq=&as_oq=' . $name['givn'] . '&as_eq=&as_nlo=&as_nhi=&lr=&cr=&as_qdr=all&as_sitesearch=denkmalprojekt.org&as_occt=any&safe=images&as_filetype=&as_rights=';
	}

	static function encodePlus() {
		return false;
	}

}
