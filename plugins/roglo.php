<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class roglo_plugin extends research_base_plugin {
	static function getName() {
		return 'Roglo';
	}
	
	static function create_link($primary_name) {
		return $link = 'http://roglo.eu/roglo?lang='
						.WT_LOCALE
						.'&m=NG&n='
						.rawurlencode($primary_name['givn'])
						.'+'
						.rawurlencode($primary_name['surname'])
						.'&t=PN';
	}
	
	static function create_sublink($primary_name) {
		return false;
	}
}
