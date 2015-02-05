<?php

namespace Webtrees;

class int_roglo_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Roglo';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://roglo.eu/roglo?lang=' . WT_LOCALE . '&m=NG&n=' . $fullname . '&t=PN';
	}

	static function encode_plus() {
		return true;
	}

}
