<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class voorouder_plugin extends research_base_plugin {
	static function getName() {
		return 'Voorouder.nl';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.voorouder.nl/genealogie/search.php?mybool=AND&amp;nr=50&amp;showdeath=yes&amp;mylastname='.$surname.'&amp;lnqualify=equals&amp;myfirstname='.rawurlencode($givn).'&amp;fnqualify=contains';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}