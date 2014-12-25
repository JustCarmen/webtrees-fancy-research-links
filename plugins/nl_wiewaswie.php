<?php

class nl_wiewaswie_plugin extends research_base_plugin {

	static function getName() {
		return 'NL | WieWasWie';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.wiewaswie.nl/personen-zoeken/zoeken/q/' . $fullname . '/type/documenten';
	}

	static function encode_plus() {
		return true;
	}

}
