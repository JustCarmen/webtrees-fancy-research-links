<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class wiewaswie_plugin extends research_base_plugin {
	static function getName() {
		return 'WieWasWie';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.wiewaswie.nl/personen-zoeken/zoeken/q/' . $fullname . '/type/documenten';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}