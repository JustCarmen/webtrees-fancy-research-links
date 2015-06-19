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

class ResearchBasePlugin {	
	
	/**
	 * Scan the plugin folder for a list of plugins
	 */
	static function getPluginList(){
		foreach (glob(__DIR__ . '/Plugin/*.php') as $file) {
			$label = basename($file, ".php");
			$class = __NAMESPACE__ . '\Plugin\\' . $label;
			$array[$label] = new $class;
		}		
		return $array;
	}
	
	/**
	 * Encode the url
	 */
	static function encodeUrl($url, $plus) {
		if ($plus) {
			return str_replace("%20", "+", rawurlencode($url));
		} else {
			return rawurlencode($url);
		}
	}
	
	/**
	 * Encode the url without +
	 */
	static function encodePlus() {
		return false;
	}

	static function createSublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}

	

}
