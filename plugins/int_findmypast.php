<?php

class int_findmypast_plugin extends research_base_plugin {
	static function getName() {
		return 'INT | Findmypast | $';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://search.findmypast.com/search/world-records?firstname=' . $givn . '&firstname_variants=true&lastname=' . $surname;
	}
}
