<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class wikipedia_person_plugin extends research_base_plugin {
	static function getName() {
		return 'Wikipedia-Personensuche';  // uses German wikipedia
	}

	static function create_link($primary_name) {		
		return $link = 'https://toolserver.org/~apper/pd/person/'
						.rawurlencode($primary_name['givn'])
						.'_'
						.rawurlencode($primary_name['surname']);
	}
	
	static function create_sublink($primary_name) {
		return false;
	}
}
