<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DeutscheNationalbibliothekPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Deutsche Nationalbibliothek';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'DEU';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		$values = [$name['surn'], $name['first']];
		$query  = implode('+', array_filter($values, function ($v) {
			return $v !== null && $v !== '';
		}));

		return 'https://portal.dnb.de/opac/simpleSearch?query=' . e($query);
	}
}
