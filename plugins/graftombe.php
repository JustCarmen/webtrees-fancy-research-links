<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class graftombe_plugin extends research_base_plugin {
	static function getName() {
		return 'Graftombe';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$surname = $prefix ? $surn . ' ' . $prefix : $surn;
		return $link = 'http://www.graftombe.nl/names/search?forename=' . $givn . '&surname=' . $surname .'&submit=Zoeken&r=names-search';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}