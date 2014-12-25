<?php

class nl_delpher_kranten_plugin extends research_base_plugin {

	static function getName() {
		return 'NL | Delpher Krantenarchief';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://kranten.delpher.nl/nl/results?query=' . urlencode('"') . $fullname . urlencode('"') . '&coll=ddd';
	}

	static function encode_plus() {
		return true;
	}

}
