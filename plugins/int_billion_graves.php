<?php

namespace Webtrees;

class int_billion_graves_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Billion Graves';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://billiongraves.com/pages/search/#given_names=' . $givn . '&family_names=' . $surname . '&birth_year=&death_year=&year_range=5&lim=0&num=10&action=search&exact=false&phonetic=true&record_type=0&country=0&state=0&county=0';
	}

}
