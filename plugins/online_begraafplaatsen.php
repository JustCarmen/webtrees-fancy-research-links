<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class online_begraafplaatsen_plugin extends research_base_plugin {
	static function getName() {
		return 'Online Begraafplaatsen';
	}	
	
	static function create_link($primary_name) {
		$name = $primary_name['givn'].' '.$primary_name['surname'];
		return $link = 'http://www.online-begraafplaatsen.nl/zoeken.asp?command=zoekformres&achternaam='.str_replace(" ", "+", $primary_name['surname']).'&amp;voornaam='.$primary_name['givn'];
	}

	static function create_sublink($primary_name) {
		return false;
	}
}