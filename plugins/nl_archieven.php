<?php

class nl_archieven_plugin extends research_base_plugin {
	static function getName() {
		return 'NL | Archieven.nl';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.archieven.nl/nl/zoeken?mivast=0&mizig=310&miadt=0&milang=nl&misort=dt|asc&miview=tbl&mip3=' . $surn .'&mip2=' . $prefix . '&mip1=' . $givn;
	}	
}
