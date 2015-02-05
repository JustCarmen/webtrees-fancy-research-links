<?php

namespace Webtrees;

class int_ancestry_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Ancestry | $';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$domain = array(
			// these are all the languages supported by ancestry. See: http://corporate.ancestry.com/about-ancestry/international/
			'de'	 => 'de', // German
			'en_GB'	 => 'co.uk',
			'en_US'	 => 'com',
			'en_AUS' => 'com.au', // not used by webtrees
			'fr'	 => 'fr',
			'it'	 => 'it',
			'sv'	 => 'se', // Swedish
		);
		// ancestry supports Canada in English and French versions, too; but webtrees doesn't support these language versions
		if (isset($domain[WT_LOCALE])) {
			$ancestry_domain = $domain[WT_LOCALE];
		} else {
			$ancestry_domain = $domain['en_US'];
		}

		return $link = 'http://search.ancestry.' . $ancestry_domain . '/cgi-bin/sse.dll?new=1&gsfn=' . $givn . '&gsln=' . $surname . '&gl=ROOT_CATEGORY&rank=1';
	}

}
