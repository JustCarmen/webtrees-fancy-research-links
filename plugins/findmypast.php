<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class findmypast_plugin extends research_base_plugin {
	static function getName() {
		return 'findmypast';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://search.findmypast.com/search/world-records?firstname=' . $givn . '&firstname_variants=true&lastname=' . $surname;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}
