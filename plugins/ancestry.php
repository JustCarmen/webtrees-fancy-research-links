<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class ancestry_plugin extends research_base_plugin {
	static function getName() {
		return 'Ancestry';
	}
	
	/**
	* Based on function print_name_record() in /library/WT/Controller/Individual.php
	*/
	static function create_link(WT_Fact $event) {
		if (!$event->canShow()) {
			return false;
		}
		$factrec = $event->getGedCom();
		// Create a dummy record, so we can extract the formatted NAME value from the event.
		$dummy=new WT_Individual(
			'xref',
			"0 @xref@ INDI\n1 DEAT Y\n".$factrec,
			null,
			WT_GED_ID
		);
		$all_names=$dummy->getAllNames();
		$primary_name=$all_names[0];
		
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
						// &gss=sfs63_&sbo=0';
						// &gss=sfs21_cms_lohp_de&msydy=<year>&msypn__ftp=<place>
	}
	
	static function create_sublink(WT_Fact $event) {
		return false;
	}
}
