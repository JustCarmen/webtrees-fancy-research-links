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

class MetaGenealogyPlugin extends FancyResearchLinksClass {

  static function getPluginName() {
    return 'Genealogy.net Meta Search';
  }

  static function getSearchArea() {
    return 'DEU';
  }

  static function createLink($name) {
    // Often it's better to run the search just with the surname.
    // It's a post form, so it will be send by javascript in a new window.
    $url = 'http://meta.genealogy.net/search/index';

    $params = [
        'lastname'  => $name['surname'],
        'placename' => ''
    ];

    for ($i = 1; $i <= 19; $i++) {
      $params['partner' . $i] = 'on';
    }

    return "javascript: postresearchform('" . $url . "'," . json_encode($params) . ")";
  }

}
