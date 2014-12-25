<?php

class de_wikipedia_person_plugin extends research_base_plugin {
	static function getName() {
		return 'DE | Wikipedia-Personensuche';  // uses German wikipedia
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {		
		return $link = 'https://toolserver.org/~apper/pd/person/' . $givn . '_' . $surname;
	}
}
