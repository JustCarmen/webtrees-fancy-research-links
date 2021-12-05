<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class WikipediaPersonPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Wikipedia-Personensuche';  // uses German wikipedia
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

		return 'https://tools.wmflabs.org/persondata/index.php?name=' . $name['first'] . '* ' . $name['surname'];
	}
}
