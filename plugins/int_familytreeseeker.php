<?php

class int_familytreeseeker_plugin extends research_base_plugin {
	static function getName() {
		return 'INT | Familytreeseeker';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://familytreeseeker.com/search.php?l=en&fn=' . $givn . '&sn=' . $surname . '&m=1&bd1=0&bd2=0&bp=&t=1&submit=Search';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
	
	static function encode_plus() {
		return true;	
	}
}
