<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OnlineBegraafplaatsenPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Online Begraafplaatsen';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');;
	}

	public static function researchLink($name): string
    {
		// This is a post form, so it will be send with Javascript
		$url    = 'https://www.online-begraafplaatsen.nl/zoeken.asp?command=zoekform';
		$params = [
		'achternaam' => $name['surn'],
		'voornaam'   => $name['first'] . '*'
	];

		return "javascript: postresearchform('" . $url . "'," . json_encode($params) . ")";
	}
}
