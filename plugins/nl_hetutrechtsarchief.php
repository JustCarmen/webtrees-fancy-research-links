<?php

class nl_hetutrechtsarchief_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Het Utrechts Archief';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {		
		return $link = 	'http://www.hetutrechtsarchief.nl/collectie/archiefbank/indexen/personen/' .
						'zoekresultaat?mivast=39&miadt=39&mizig=100&miview=tbl&milang=nl&micols=1&mires=0' .
						'&mip1=' . $surn . '&mip2=' .$prefix . '&mip3=' . $givn;
	}
}