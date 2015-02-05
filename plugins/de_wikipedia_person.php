<?php

namespace Webtrees;

class de_wikipedia_person_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'DE | Wikipedia-Personensuche';  // uses German wikipedia
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://toolserver.org/~apper/pd/person/' . $givn . '_' . $surname;
	}

}
