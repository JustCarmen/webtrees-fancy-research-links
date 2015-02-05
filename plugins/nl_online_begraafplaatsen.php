<?php

namespace Webtrees;

class nl_online_begraafplaatsen_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Online Begraafplaatsen';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		// querystrings are not possible anymore due to changes in website functionality. Just present the link to the website.
		return $link = 'http://www.online-begraafplaatsen.nl/zoeken.asp';
	}

}
