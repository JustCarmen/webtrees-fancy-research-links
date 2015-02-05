<?php

namespace Webtrees;

class nl_wikipedia_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Wikipedia';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$language = substr(WT_LOCALE, 0, 2);
		return $link = 'https://' . $language . '.wikipedia.org/wiki/' . $givn . '_' . $surname;
	}

}
