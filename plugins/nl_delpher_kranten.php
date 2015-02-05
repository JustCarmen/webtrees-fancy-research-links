<?php

namespace Webtrees;

class nl_delpher_kranten_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Delpher Krantenarchief';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://kranten.delpher.nl/nl/results?query=' . urlencode('"') . $fullname . urlencode('"') . '&coll=ddd';
	}

	static function encode_plus() {
		return true;
	}

}
