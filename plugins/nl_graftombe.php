<?php

namespace Webtrees;

class nl_graftombe_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Graftombe';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$surname = $prefix ? $surn . ' ' . $prefix : $surn;
		return $link = 'http://www.graftombe.nl/names/search?forename=' . $givn . '&surname=' . $surname . '&submit=Zoeken&r=names-search';
	}

	static function encode_plus() {
		return true;
	}

}
