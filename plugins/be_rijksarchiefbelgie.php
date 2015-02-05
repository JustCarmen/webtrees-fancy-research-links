<?php

namespace Webtrees;

class be_rijksarchiefbelgie_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'BE | Rijksarchief België';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = '#';
	}

	static function createSublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		return $link = array(
			array(
				'title'	 => I18N::translate('birth'),
				'link'	 => 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $surname . '/q/persoon_voornaam_t_0/' . $givn . '/q/zoekwijze/s?M=0&amp;V=0&amp;O=1&amp;persoon_0_periode_soort=geboorte&persoon_0_periode_geen=0'
			),
			array(
				'title'	 => I18N::translate('death'),
				'link'	 => 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $surname . '/q/persoon_voornaam_t_0/' . $givn . '/q/zoekwijze/s?M=0&amp;V=0&amp;O=1&amp;persoon_0_periode_soort=overlijden&persoon_0_periode_geen=0'
			)
		);
	}

}
