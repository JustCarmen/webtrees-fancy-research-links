<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2017 webtrees development team
 * Copyright (C) 2017 JustCarmen
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

class StadsarchiefRotterdamPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Stadsarchief Rotterdam';
	}

	static function getSearchArea() {
		return 'NLD';
	}

	static function createLink($name) {
		return 'http://www.stadsarchief.rotterdam.nl/archieven?mivast=184&miadt=184&mizig=100&miview=tbl&milang=nl&micols=1&misort=dt|asc&mip1=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip3=' . $name['givn'];
	}
}
