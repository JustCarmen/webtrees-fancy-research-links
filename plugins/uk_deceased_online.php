<?php

namespace Webtrees;

class uk_deceased_online_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'UK | Deceased Online';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.deceasedonline.com/servlet/GSDOSearch?' . 'GSDOInptSName=' . $surname . '&GSDOInptFName=' . $first;
	}

}
