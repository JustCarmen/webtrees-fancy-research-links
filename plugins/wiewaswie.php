<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class wiewaswie_plugin extends research_base_plugin {
	static function getName() {
		return 'WieWasWie';
	}

	static function create_link($primary_name) {
		return $link = 'https://www.wiewaswie.nl/personen-zoeken/zoeken/q/'.str_replace(" ", "+", $primary_name['givn'].' '.$primary_name['surn']).'/type/documenten';
	}

	static function create_sublink($primary_name) {
		return false;
	}
}