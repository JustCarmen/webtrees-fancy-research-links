<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class ancestry_plugin extends research_base_plugin {
	static function getName() {
		return 'Ancestry';
	}

	static function create_link($primary_name) {
		$domain = array(
			'de'	=> 'de',
			'en_GB' => 'co.uk',
			'en_US' => 'com',
			'it'	=> 'it',
			);
		if (isset($domain[WT_LOCALE])) {
			$ancestry_domain = $domain[WT_LOCALE];
		} else {
			$ancestry_domain = $domain['en_US'];
		}

		return $link = 'http://search.ancestry.'.$ancestry_domain.'/cgi-bin/sse.dll?new=1&gsfn='
						.rawurlencode($primary_name['givn'])
						.'&gsln='
						.rawurlencode($primary_name['surname'])
						.'&gl=ROOT_CATEGORY&rank=1';
	}

	static function create_sublink($primary_name) {
		return false;
	}
}
