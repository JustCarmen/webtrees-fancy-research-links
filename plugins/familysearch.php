<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class familysearch_plugin extends research_base_plugin {
	static function getName() {
		return 'Family Search';
	}

	static function create_link($primary_name) {
		return $link = 'https://familysearch.org/search/record/results#count=20&query=%2Bgivenname%3A%22'
						.rawurlencode($primary_name['givn'])
						.'%22~%20%2Bsurname%3A%22'
						.rawurlencode($primary_name['surname'])
						.'%22~';
	}

	static function create_sublink($primary_namet) {
		return false;
	}
}
