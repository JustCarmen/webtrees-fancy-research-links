<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class dsrotterdam_plugin extends research_base_plugin {
	static function getName() {
		return 'Digitale Stamboom Rotterdam';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://rotterdam.digitalestamboom.nl/search.aspx?lang=nl&verder=' . $givn . urlencode('||') . $prefix . urlencode('|') . $surn;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}