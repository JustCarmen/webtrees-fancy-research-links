<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class find_a_grave_plugin extends research_base_plugin {
	static function getName() {
		return 'Find a Grave';
	}

	static function create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.findagrave.com/cgi-bin/fg.cgi?page=gsr&GSfn=' . $first . '&GSmn=' . $middle . '&GSln=' . $surname				. '&GSbyrel=all&GSby=&GSdyrel=all&GSdy=&GScntry=0&GSst=0&GSgrid=&df=all&GSob=n';
	}

	static function create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return false;
	}
}
