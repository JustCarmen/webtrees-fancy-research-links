<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class geneall_plugin extends research_base_plugin {
	static function getName() {
		return 'Geneall';
	}
	
	static function create_link($primary_name) {
		$languages = array(
			'de'		=> 'D',
			'en_GB' 	=> 'U',
			'en_US'		=> 'U',
			'fr'		=> 'F',
			'it'		=> 'I',
			'es'		=> 'H',
			'pt'		=> 'P',
			'pt_BR'		=> 'P',
			);

		if (isset($languages[WT_LOCALE])) {
			$language = $languages[WT_LOCALE];
		} else {
			$language = $languages['en_US'];
		}

		return $link = 'http://www.geneall.net/'
						.$language
						.'/per_search.php?s='
						.rawurlencode($primary_name['givn'])
						.'+'
						.rawurlencode($primary_name['surname'])
						.'&s_type=per_search.php';
	}
	
	static function create_sublink($primary_name) {
		return false;
	}
}
