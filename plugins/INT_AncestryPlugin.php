<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_AncestryPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
	{
		return 'Ancestry ($)';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
	{
		return 'INT';
	}

	public function researchLink($attributes): string
	{
		$domain = [
		// these are all the languages supported by ancestry. See: http://corporate.ancestry.com/about-ancestry/international/
		'de'     => 'de', // German
		'en-GB'  => 'co.uk',
		'en-US'  => 'com',
		'en-AU' => 'com.au', // not used by webtrees
		'fr'     => 'fr',
		'it'     => 'it',
		'sv'     => 'se', // Swedish
	];
		// ancestry supports Canada in English and French versions, too; but webtrees doesn't support these language versions
		$locale = I18N::languageTag();
		if (isset($domain[$locale])) {
			$ancestry_domain = $domain[$locale];
		} else {
			$ancestry_domain = $domain['en-US'];
		}

		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];
		$plac = $attributes['PLACE'];

		$birthyear	= $year['BIRT'];
		$birthplace	= $plac['BIRT'];
		$deathyear	= $year['DEAT'];
		$deathplace	= $plac['DEAT'];
		//$marryear	= $year['MARR'];
		//$marrplace	= $plac['MARR'];

		return 'https://ancestry.' . $ancestry_domain .
		'/search/?name=' . $name['givn'] . '_' . $name['surname'] .
		'&birth=' . $birthyear . '_' . $birthplace .
		'&death=' . $deathyear . '_' . $deathplace;
		//'&marriage=' . $marryear . '_' . $marrplace;
		//'&residence=' . $resi;
	}
}
