<?php

class nl_graftombe_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Graftombe';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$surname = $prefix ? $surn . ' ' . $prefix : $surn;
		return $link = 'http://www.graftombe.nl/names/search?forename=' . $givn . '&surname=' . $surname .'&submit=Zoeken&r=names-search';
	}
	
	static function encode_plus() {
		return true;	
	}
}