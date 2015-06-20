<?php
/*
 *  webtrees: Web based Family History software
 *  Copyright (C) 2015 webtrees development team.
 *  Copyright (C) 2015 JustCarmen.
 * 
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 */
namespace JustCarmen\WebtreesAddOns\Module\FancyResearchLinks;

use Fisharebest\Webtrees\Fact;
use Fisharebest\Webtrees\Individual;

class FancyResearchLinksClass extends FancyResearchLinksModule {
	
	/**
	 * Scan the plugin folder for a list of plugins
	 */
	static function getPluginList() {
		foreach (glob(__DIR__ . '/Plugin/*.php') as $file) {
			$label = basename($file, ".php");
			$class = __NAMESPACE__ . '\Plugin\\' . $label;
			$array[$label] = new $class;
		}
		return $array;
	}

	/*
	 * Based on function print_name_record() in /app/Controller/IndividualController.php	 * 
	 */

	static function getPrimaryName(Fact $event) {
		$factrec = $event->getGedCom();
		// Create a dummy record, so we can extract the formatted NAME value from the event.
		$dummy = new Individual(
			'xref', "0 @xref@ INDI\n1 DEAT Y\n" . $factrec, null, $event->getParent()->getTree()
		);
		$all_names = $dummy->getAllNames();
		return $all_names[0];
	}
	
	static function getNames($primary, $encodeplus) {
		$name = array();
		$name['givn'] = self::encodeUrl($primary['givn'], $encodeplus);
					
		$given = explode(" ", $primary['givn']);
		$name['first'] = $given[0];					
		if (count($given) > 1) {
			$name['middle'] = $given[1];
		}

		$name['surn'] = self::encodeUrl($primary['surn'], $encodeplus);
		$name['surname'] = self::encodeUrl($primary['surname'], $encodeplus);

		if ($encodeplus) {
			$name['fullname'] = $name['givn'] . '+' . $name['surname'];
		} else {
			$name['fullname'] = $name['givn'] . '%20' . $name['surname'];
		}

		if ($name['surn'] !== $name['surname']) {
			$name['prefix'] = substr($name['surname'], 0, strpos($name['surname'], $name['surn']) - 3);
		} else {
			$name['prefix'] = "";
		}
		
		return $name;
	}	

	/**
	 * Encode the url without +
	 */
	static function encodePlus() {
		return false;
	}
	
	/**
	 * Encode the url
	 */
	static function encodeUrl($url, $encodeplus) {
		if ($encodeplus) {
			return str_replace("%20", "+", rawurlencode($url));
		} else {
			return rawurlencode($url);
		}
	}

}
