<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class roglo_plugin extends research_base_plugin {
	static function getName() {
		return 'Roglo';
	}
	
	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://roglo.eu/roglo?lang=' . WT_LOCALE . '&m=NG&n=' . str_replace("%20", "+", $fullname) . '&t=PN';
	}
	
	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}
