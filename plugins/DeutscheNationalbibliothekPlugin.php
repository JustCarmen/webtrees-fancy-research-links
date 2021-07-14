<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DeutscheNationalbibliothekPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Deutsche Nationalbibliothek';
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
		$values = [$name['surn'], $name['first']];
		$query  = implode('+', array_filter($values, function ($v) {
			return $v !== null && $v !== '';
		}));
		return 'https://portal.dnb.de/opac/simpleSearch?query=' . e($query);
	}
}
