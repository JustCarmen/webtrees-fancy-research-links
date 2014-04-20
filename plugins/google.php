<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class google_plugin extends research_base_plugin {
	static function getName() {
		return 'Google';
	}	
	
	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.google.com/search?q=' . $fullname;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}
