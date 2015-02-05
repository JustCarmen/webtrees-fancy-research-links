<?php

namespace Webtrees;

class int_findmypast_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Findmypast | $';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://search.findmypast.com/search/world-records?firstname=' . $givn . '&firstname_variants=true&lastname=' . $surname;
	}

}
