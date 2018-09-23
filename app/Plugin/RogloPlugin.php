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

class RogloPlugin extends FancyResearchLinksClass {

	static function getPluginName() {
		return 'Roglo';
	}

	static function getSearchArea() {
		return 'INT';
	}

	static function createLink($name) {
		$languages = ['af', 'bg', 'br', 'ca', 'cs', 'da', 'de', 'es', 'et', 'fi', 'fr', 'he', 'is', 'it', 'lv', 'nl', 'pl', 'pt', 'ro', 'ru', 'sl', 'sv', 'zh'];

		switch (WT_LOCALE) {
			case 'pt-BR':
				$language	 = 'br';
				break;
			case 'fr-CA':
				$language	 = 'fr';
				break;
			case 'zh-Hans':
				$language	 = 'zh';
			default:
				$language	 = WT_LOCALE;
		}

		if (!in_array($language, $languages)) {
			$language = 'en';
		}

		return 'http://roglo.eu/roglo?lang=' . $language . '&m=NG&n=' . $name['fullname'] . '&t=PN';
	}

	static function encodePlus() {
		return true;
	}

}
