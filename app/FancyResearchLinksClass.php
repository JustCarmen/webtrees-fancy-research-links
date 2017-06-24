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
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks;

use Fisharebest\Webtrees\Database;
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
    $plugins  = [];
    $lang_int	 = I18N::translate('International');
    $lang_ols	 = I18N::translate('Other links');

    foreach (glob(__DIR__ . '/Plugin/*.php') as $file) {
      $label  = basename($file, ".php");
      $class  = __NAMESPACE__ . '\Plugin\\' . $label;
      $plugin = new $class;
      $area = self::getSearchAreaName($plugin->getSearchArea());
      $plugins[$area][$label] = $plugin;
    }
    ksort($plugins);

    $plugins_int = [];
    if (array_key_exists($lang_int, $plugins)) {
      $plugins_int = [$lang_int => $plugins[$lang_int]];
      unset($plugins[$lang_int]);
    }

    $plugins_ols = [];
    if (array_key_exists($lang_ols, $plugins)) {
      $plugins_ols = [$lang_ols => $plugins[$lang_ols]];
      unset($plugins[$lang_ols]);
    }

    return array_filter(array_merge($plugins_int, $plugins, $plugins_ols));
  }

  /**
   * Get the enabled plugins set in configuration panel and saved into the database
   * If the database setting is empty then return all plugins
   *
   * @return array
   */
  Protected function getEnabledPlugins($plugins) {
    $count_module_settings = (int) Database::prepare(
            "SELECT COUNT(*) FROM `##module_setting` WHERE module_name = ?"
        )->execute([$this->getName()])->fetchOne();

    if ($count_module_settings > 0) {
      $enabled_plugins = explode(',', $this->getPreference('FRL_PLUGINS'));
    } else {
      $enabled_plugins = array_keys($plugins);
    }

    return $enabled_plugins;
  }

  /**
   * Count the enabled plugins
   *
   * @param type $plugins
   * @param type $enabled_plugins
   * @return int
   */
  protected function countEnabledPlugins($plugins, $enabled_plugins) {
    $count = 0;
    foreach (array_keys($plugins) as $label) {
      if (in_array($label, $enabled_plugins)) {
        $count += 1;
      }
    }
    return $count;
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
    $stats     = new Stats($WT_TREE);
    $countries = $stats->getAllCountries();

    if ($area === '') {
		$area = I18N::translate("Other links");
	} elseif (array_key_exists($area, $countries)) {
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
   * Based on function print_name_record() in /app/Controller/IndividualController.php
   *
   * @param Fact $event
   * @return array
   */
  protected function getPrimaryName(Fact $event) {
    $factrec   = $event->getGedCom();
    // Create a dummy record, so we can extract the formatted NAME value from the event.
    $dummy     = new Individual(
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
    $name         = [];
    $name['givn'] = self::encodeUrl($primary['givn'], $encodeplus);

    $given         = explode(" ", $primary['givn']);
    $name['first'] = $given[0];
    if (count($given) > 1) {
      $name['middle'] = $given[1];
    } else {
      $name['middle'] = '';
    }

    if ($primary['surn'] !== $primary['surname']) {
      $prefix         = substr($primary['surname'], 0, strpos($primary['surname'], $primary['surn']) - 1);
      $name['prefix'] = self::encodeUrl($prefix, $encodeplus);
    } else {
      $name['prefix'] = "";
    }

    $name['surn']    = self::encodeUrl($primary['surn'], $encodeplus);
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

}
