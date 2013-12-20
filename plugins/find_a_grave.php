<?php

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class find_a_grave_plugin extends research_base_plugin {
	static function getName() {
		return 'Find a Grave';
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

		return $link = 'http://www.findagrave.com/cgi-bin/fg.cgi?page=gsr&GSfn='
						.rawurlencode($primary_name['givn'])
						.'&GSmn=&GSln='
						.rawurlencode($primary_name['surname'])
						.'&GSbyrel=all&GSby=&GSdyrel=all&GSdy=&GScntry=0&GSst=0&GSgrid=&df=all&GSob=n';
	}
	
	static function create_sublink(WT_Fact $event) {
		return false;
	}
}
