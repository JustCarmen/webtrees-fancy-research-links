<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class rootsweb_plugin extends research_base_plugin {
	static function getName() {
		return 'Rootsweb';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://worldconnect.rootsweb.ancestry.com/cgi-bin/igm.cgi?op=Search&lang=en&surname=' .$surname . '&stype=Exact&given=' . $givn . '&brange=0&drange=0&mrange=0&period=All&submit.x=Search';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}