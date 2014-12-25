<?php

class uk_deceased_online_plugin extends research_base_plugin {

	static function getName() {
		return 'UK | Deceased Online';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'https://www.deceasedonline.com/servlet/GSDOSearch?' . 'GSDOInptSName=' . $surname . '&GSDOInptFName=' . $first;
	}

}
