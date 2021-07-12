<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class MetaGenealogyPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Genealogy.net Meta Search';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Germany');;
	}

	public static function researchLink($name): string
    {
		// Often it's better to run the search just with the surname.
		// It's a post form, so it will be send by javascript in a new window.
		$url = 'http://meta.genealogy.net/search/index';

		$params = [
		'lastname'  => $name['surname'],
		'placename' => ''
	];

		for ($i = 1; $i <= 19; $i++) {
			$params['partner' . $i] = 'on';
		}

		return "javascript: postresearchform('" . $url . "'," . json_encode($params) . ")";
	}
}
