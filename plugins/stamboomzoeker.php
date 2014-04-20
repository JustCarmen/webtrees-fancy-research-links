<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class stamboomzoeker_plugin extends research_base_plugin {
	static function getName() {
		return 'Stamboomzoeker';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://stamboomzoeker.nl/search.php?l=nl&fn=' . $givn . '&sn=' . $surname . '&m=1&bd1=0&bd2=2014&bp=&t=1&submit=Zoeken';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}
