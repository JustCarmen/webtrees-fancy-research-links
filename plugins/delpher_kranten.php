<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class delpher_kranten_plugin extends research_base_plugin {
	static function getName() {
		return 'Delpher Krantenarchief';
	}	
	
	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		print_r($fullname);
		return $link = 'http://kranten.delpher.nl/nl/results?query='.str_replace(" ", "+", $fullname);
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}