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

class StamboomZoekerPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Stamboomzoeker';
	}

	static function getSearchArea() {
		return 'NLD';
	}

	static function createLink($name) {
		return 'https://stamboomzoeker.nl/search.php?l=nl&fn=' . strtolower($name['givn']) . '&sn=' . strtolower($name['surname']) . '&m=1&bd1=0&bd2=0&bp=&t=1&submit=Zoeken';
	}

	static function encodePlus() {
		return true;
	}

}
