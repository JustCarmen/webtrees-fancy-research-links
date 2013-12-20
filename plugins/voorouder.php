<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class voorouder_plugin extends research_base_plugin {
	static function getName() {
		return 'Voorouder.nl';
	}

	static function create_link($primary_name) {
		$givn   = $primary_name['givn'];
		$surn   = $primary_name['surn'];
		if($surn != $primary_name['surname']) {
			$prefix = substr($primary_name['surname'], 0, strpos($primary_name['surname'], $surn) - 1);
		}
		else {
			$prefix = "";
		}

		return $link = 'http://www.voorouder.nl/genealogie/search.php?mybool=AND&amp;nr=50&amp;showdeath=yes&amp;mylastname='.$primary_name['surname'].'&amp;lnqualify=equals&amp;myfirstname='.rawurlencode($givn).'&amp;fnqualify=contains';
	}

	static function create_sublink($primary_name) {
		return false;
	}
}