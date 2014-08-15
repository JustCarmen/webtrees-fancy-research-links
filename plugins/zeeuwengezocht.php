<?php

class zeeuwengezocht_plugin extends research_base_plugin {
	static function getName() {
		return 'Zeeuwen Gezocht';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.zeeuwengezocht.nl/nl/zoeken?mivast=1539&miadt=239&mizig=862&miview=tbl&milang=nl&micols=1&mires=0&mip3='
						. $surn . '&mip2=' . $prefix . '&mip1=' . $givn;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return false;	
	}
}
