<?php

class int_geneall_plugin extends research_base_plugin {

	static function getName() {
		return 'INT | Geneall | $';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		// this plugin needs refactoring. Multiple websites for multiple country categories. Not on a per language base. See: http://www.geneall.net/site/home.php
		$languages = array(
			'de'	 => 'D',
			'en_GB'	 => 'U',
			'en_US'	 => 'U',
			'fr'	 => 'F',
			'it'	 => 'I',
			'es'	 => 'H',
			'pt'	 => 'P',
			'pt_BR'	 => 'P',
		);

		if (isset($languages[WT_LOCALE])) {
			$language = $languages[WT_LOCALE];
		} else {
			$language = $languages['en_US'];
		}

		return $link = 'http://www.geneall.net/' . $language . '/per_search.php?s=' . $fullname . '&s_type=per_search.php';
	}

	static function encode_plus() {
		return true;
	}

}
