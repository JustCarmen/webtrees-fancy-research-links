<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class digitalestamboom_plugin extends research_base_plugin {
	static function getName() {
		return 'Digitale Stamboom';
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

		return $link = 'http://www.digitalestamboom.nl/search.aspx?lang=nl&verder='.$givn.'||'.$prefix.'|'.$surn;;
	}

	static function create_sublink($primary_name) {
		return false;
	}
}