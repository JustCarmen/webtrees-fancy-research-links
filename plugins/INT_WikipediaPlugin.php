<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_WikipediaPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Wikipedia';
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
		$language = substr(I18N::languageTag(), 0, 2);
		$name = $attributes['NAME'];

		return 'https://' . $language . '.wikipedia.org/wiki/' . $name['first'] . '_' . $name['surname'];
	}
}
