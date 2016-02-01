<?php
/*
 *  webtrees: Web based Family History software
 *  Copyright (C) 2016 webtrees development team.
 *  Copyright (C) 2016 JustCarmen.
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
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks;

use Fisharebest\Webtrees\Fact;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Individual;
use Fisharebest\Webtrees\Stats;

class FancyResearchLinksClass extends FancyResearchLinksModule {

	/**
	 * Scan the plugin folder for a list of plugins, sort them by searchArea but keep the International list on top.
	 * 
	 * @return array
	 */
	protected function getPluginList() {
		$plugins = array();
		foreach (glob(__DIR__ . '/Plugin/*.php') as $file) {
			$label = basename($file, ".php");
			$class = __NAMESPACE__ . '\Plugin\\' . $label;
			$plugin = new $class;
			if ($plugin->createLinkOnly()) {
				$area = I18N::translate('Other links');
			} else {
				$area = self::getSearchAreaName($plugin->getSearchArea());
			}
			$plugins[$area][$label] = $plugin;
		}
		ksort($plugins);
		$int = I18N::translate("International");
		$ol = I18N::translate('Other links');
		$pluginlist = array_merge(array($int => $plugins[$int]), $plugins, array($ol => $plugins[$ol]));
		return $pluginlist;
	}

	/**
	 * Get the translatable country name for the search area.
	 * 
	 * @global type $WT_TREE
	 * @param type $area
	 * @return string
	 */
	static function getSearchAreaName($area) {
		global $WT_TREE;
		$stats = new Stats($WT_TREE);
		$countries = $stats->getAllCountries();
		if (array_key_exists($area, $countries)) {
			$area = $countries[$area];
		} else {
			$area = I18N::translate("International");
		}
		return $area;
	}

	/**
	 * Create link with name search
	 * 
	 * @param type $name
	 * @return
	 */
	static function createLink($name) {
		return;
	}

	/**
	 * Create link only function. Create link without name search. Default is none;
	 * 
	 * @return
	 */
	static function createLinkOnly() {
		return;
	}

	/**
	 * Based on function print_name_record() in /app/Controller/IndividualController.php
	 * 
	 * @param Fact $event
	 * @return array
	 */
	protected function getPrimaryName(Fact $event) {
		$factrec = $event->getGedCom();
		// Create a dummy record, so we can extract the formatted NAME value from the event.
		$dummy = new Individual(
			'xref', "0 @xref@ INDI\n1 DEAT Y\n" . $factrec, null, $event->getParent()->getTree()
		);
		$all_names = $dummy->getAllNames();
		return $all_names[0];
	}

	/**
	 * Get name parts
	 * 
	 * @param type $primary
	 * @param type $attrs
	 * @param type $encodeplus
	 * @return array
	 */
	protected function getNames($primary, $attrs, $encodeplus) {
		$name = array();
		$name['givn'] = self::encodeUrl($primary['givn'], $encodeplus);

		$given = explode(" ", $primary['givn']);
		$name['first'] = $given[0];
		if (count($given) > 1) {
			$name['middle'] = $given[1];
		} else {
			$name['middle'] = '';
		}

		if ($primary['surn'] !== $primary['surname']) {
			$prefix = substr($primary['surname'], 0, strpos($primary['surname'], $primary['surn']) - 1);
			$name['prefix'] = self::encodeUrl($prefix, $encodeplus);
		} else {
			$name['prefix'] = "";
		}

		$name['surn'] = self::encodeUrl($primary['surn'], $encodeplus);
		$name['surname'] = self::encodeUrl($primary['surname'], $encodeplus);

		if ($encodeplus) {
			$name['fullname'] = $name['givn'] . '+' . $name['surname'];
		} else {
			$name['fullname'] = $name['givn'] . '%20' . $name['surname'];
		}

		// the attributes are not really 'name parts' but for simplicity we just grab them into the $name array.
		foreach ($attrs as $attr => $value) {
			$name[$attr] = $value;
		}

		return $name;
	}

	/**
	 * Encode the url without + (default)
	 * @return boolean
	 */
	static function encodePlus() {
		return false;
	}

	/**
	 * Encode the url
	 * 
	 * @param type $url
	 * @param type $encodeplus
	 * @return string
	 */
	static function encodeUrl($url, $encodeplus) {
		if ($encodeplus) {
			return str_replace("%20", "+", rawurlencode($url));
		} else {
			return rawurlencode($url);
		}
	}

	/**
	 * Count the enabled plugins
	 * 
	 * @param type $plugins
	 * @param type $FRL_PLUGINS
	 * @return int
	 */
	static function countEnabledPlugins($plugins, $FRL_PLUGINS) {
		$count = 0;
		foreach (array_keys($plugins) as $label) {
			if (is_array($FRL_PLUGINS) && array_key_exists($label, $FRL_PLUGINS)) {
				$count += intval($FRL_PLUGINS[$label]);
			} else {
				$count += 1;
			}
		}
		return $count;
	}

}
