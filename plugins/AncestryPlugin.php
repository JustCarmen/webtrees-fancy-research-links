<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AncestryPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
	{
		return 'Ancestry ($)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
	{
		return I18N::translate('International');
	}

	public static function researchLink($name): string
	{
		$domain = [
		// these are all the languages supported by ancestry. See: http://corporate.ancestry.com/about-ancestry/international/
		'de'     => 'de', // German
		'en_GB'  => 'co.uk',
		'en_US'  => 'com',
		'en_AUS' => 'com.au', // not used by webtrees
		'fr'     => 'fr',
		'it'     => 'it',
		'sv'     => 'se', // Swedish
	];
		// ancestry supports Canada in English and French versions, too; but webtrees doesn't support these language versions
		$locale = I18N::languageTag();
		if (isset($domain[$locale])) {
			$ancestry_domain = $domain[$locale];
		} else {
			$ancestry_domain = $domain['en_US'];
		}

		return 'https://search.ancestry.' . $ancestry_domain . '/cgi-bin/sse.dll?new=1&gsfn=' . $name['givn'] . '&gsln=' . $name['surname'] . '&gl=ROOT_CATEGORY&rank=1';
	}
}
