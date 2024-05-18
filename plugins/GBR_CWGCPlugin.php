<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GBR_CWGCPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
	{
		return 'Commonwealth War Graves Commission';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
	{
		return 'GBR';
	}

	public function researchLink($attributes): string
	{
		$name = $attributes['NAME'];

		return 'https://www.cwgc.org/search-results/?Term=' . $name['first'] . ' + ' . $name['surname'];
	}
}
