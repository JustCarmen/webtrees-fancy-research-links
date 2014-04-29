<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class deceased_online_plugin extends research_base_plugin {
	static function getName() {
		return 'Deceased Online';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.deceasedonline.com/servlet/GSDOSearch?' .'GSDOInptSName=' .$surname .'&GSDOInptFName=' .$first;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}

	static function encode_plus() {
		return false;	
	}
}
