<?php

class int_roglo_plugin extends research_base_plugin {
	static function getName() {
		return 'INT | Roglo';
	}
	
	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://roglo.eu/roglo?lang=' . WT_LOCALE . '&m=NG&n=' . $fullname . '&t=PN';
	}
	
	static function encode_plus() {
		return true;	
	}
}
