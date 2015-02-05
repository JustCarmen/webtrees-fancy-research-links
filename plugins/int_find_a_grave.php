<?php

namespace Webtrees;

class int_find_a_grave_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Find a Grave';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = 'http://www.findagrave.com/cgi-bin/fg.cgi?page=gsr&GSfn=' . $first . '&GSmn=' . $middle . '&GSln=' . $surname . '&GSbyrel=all&GSby=&GSdyrel=all&GSdy=&GScntry=0&GSst=0&GSgrid=&df=all&GSob=n';
	}

}
