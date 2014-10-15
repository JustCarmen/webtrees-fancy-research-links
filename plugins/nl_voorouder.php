<?php

class nl_voorouder_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Voorouder.nl';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.voorouder.nl/genealogie/search.php?mybool=AND&nr=50&showdeath=yes&mylastname=' . $surname .'&lnqualify=equals&myfirstname=' . $givn .'&fnqualify=contains';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return false;	
	}
}