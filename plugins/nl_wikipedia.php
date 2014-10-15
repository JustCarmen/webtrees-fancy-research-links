<?php

class nl_wikipedia_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Wikipedia';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$language = substr(WT_LOCALE, 0, 2);	
		return $link = 'https://' . $language . '.wikipedia.org/wiki/' . $givn . '_' .$surname;
	}
	
	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return false;	
	}
}
