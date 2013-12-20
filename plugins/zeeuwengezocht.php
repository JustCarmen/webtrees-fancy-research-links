<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class zeeuwengezocht_plugin extends research_base_plugin {
	static function getName() {
		return 'Zeeuwen Gezocht';
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

		return $link = 'http://www.zeeuwengezocht.nl/nl/zoeken?mivast=1539&miadt=239&mizig=862&miview=tbl&milang=nl&micols=1&mires=0&mip3='
						.$surn.'&mip2='.$prefix.'&mip1='.$givn;
	}

	static function create_sublink($primary_name) {
		return false;
	}
}
