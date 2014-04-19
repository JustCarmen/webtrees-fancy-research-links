<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class wikipedia_person_plugin extends research_base_plugin {
	static function getName() {
		return 'Wikipedia-Personensuche';  // uses German wikipedia
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {		
		return $link = 'https://toolserver.org/~apper/pd/person/' . $givn . '_' . $surname;
	}
	
	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}
