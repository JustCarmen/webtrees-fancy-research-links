<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class online_begraafplaatsen_plugin extends research_base_plugin {
	static function getName() {
		return 'Online Begraafplaatsen';
	}	
	
	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.online-begraafplaatsen.nl/zoeken.asp?command=zoekformres&achternaam=' . str_replace("%20", "+", $surname) .'&voornaam=' . $givn;
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}