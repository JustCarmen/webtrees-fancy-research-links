<?php

class nl_digitalestamboom_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Digitale Stamboom';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.digitalestamboom.nl/search.aspx?lang=nl&verder=' . $givn . urlencode('||') . $prefix . urlencode('|') . $surn;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}