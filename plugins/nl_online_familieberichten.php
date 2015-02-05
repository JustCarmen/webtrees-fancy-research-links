<?php

namespace Webtrees;

class nl_online_familieberichten_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Online Familieberichten';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.online-familieberichten.nl/zoeken.asp?sortpers=naam&voornaam=' . $givn . '&tussenvoegsel=' . $prefix . '&achternaam=' . $surn . '&command=zoekformres';
	}

	static function encode_plus() {
		return true;
	}

}
