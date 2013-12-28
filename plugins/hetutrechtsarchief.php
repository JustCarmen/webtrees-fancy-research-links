<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class hetutrechtsarchief_plugin extends research_base_plugin {
	static function getName() {
		return 'Het Utrechts Archief';
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

		return $link = 	'http://www.hetutrechtsarchief.nl/collectie/archiefbank/indexen/personen/'.
						'zoekresultaat?mivast=39&miadt=39&mizig=100&miview=tbl&milang=nl&micols=1&mires=0'.
						'&mip1='.$surn.'&mip2='.rawurlencode($prefix).'&mip3='.$givn;
	}

	static function create_sublink($primary_name) {
		return false;
	}
}