<?php

namespace Webtrees;

class nl_zeeuwengezocht_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'NL | Zeeuwen Gezocht';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.zeeuwengezocht.nl/nl/zoeken?mivast=1539&miadt=239&mizig=862&miview=tbl&milang=nl&micols=1&mires=0&mip3='
			. $surn . '&mip2=' . $prefix . '&mip1=' . $givn;
	}

}
