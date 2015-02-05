<?php

namespace Webtrees;

class int_elephind_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Elephind Newspapers';
	}

	static function createLink($fullname, $givn, $first, $prefix, $surn, $surname) {
		return $link = 'http://www.elephind.com/?a=q&hs=1&r=1&results=1&txq="' . $first . '+' . $surname . '"&txf=txINtxCO&o=10&dafyq=&dafmq=&dafdq=&datyq=&datmq=&datdq=&puqname=Search+all+titles...&puq=&lcq=&csq=&e=-------en-10--1--txt-txINtxCO----------';
	}

}
