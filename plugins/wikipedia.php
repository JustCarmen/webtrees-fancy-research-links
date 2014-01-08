<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class wikipedia_plugin extends research_base_plugin {
	static function getName() {
		return 'Wikipedia';
	}

	static function create_link($primary_name) {
		$language = substr(WT_LOCALE, 0, 2);	
		return $link = 'https://'
						.$language
						.'.wikipedia.org/wiki/'
						.rawurlencode($primary_name['givn'])
						.'_'
						.rawurlencode($primary_name['surname']);
	}
	
	static function create_sublink($primary_name) {
		return false;
	}
}
