<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class google_plugin extends research_base_plugin {
	static function getName() {
		return 'Google';
	}	
	
	static function create_link($primary_name) {
		$name = $primary_name['givn'].' '.$primary_name['surname'];
		return $link = 'https://www.google.nl/search?q='.str_replace(" ", "+", $name);
	}

	static function create_sublink($primary_name) {
		return false;
	}
}
