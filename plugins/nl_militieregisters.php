<?php

class nl_militieregisters_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Militieregisters | $';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://militieregisters.nl/zoek#?focus%3Dd00%26p04%3D' . $givn . '%26p05%3D' . $prefix . '%26p06%3D' . $surn;
	}
	
	static function encode_plus() {
		return true;	
	}
}