<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_GooglePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Google';
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
		$name = $attributes['NAME'];

		return 'https://www.google.com/search?q="' . $name['fullNN'] . '" ~' . I18N::translate('genealogy');
	}
}
