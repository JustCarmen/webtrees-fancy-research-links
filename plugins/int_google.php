<?php

namespace Webtrees;

class int_google_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Google';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.google.com/search?q=' . $fullname;
	}

	static function encode_plus() {
		return true;
	}

}
