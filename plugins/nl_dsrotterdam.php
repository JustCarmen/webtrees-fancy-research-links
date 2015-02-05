<?php

namespace Webtrees;

class nl_dsrotterdam_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Digitale Stamboom Rotterdam';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://rotterdam.digitalestamboom.nl/search.aspx?lang=nl&verder=' . $givn . urlencode('||') . $prefix . urlencode('|') . $surn;
	}

	static function encode_plus() {
		return true;
	}

}
