<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_FacebookPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Facebook';
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

		return 'https://www.facebook.com/search/top/?q=' . $name['first'] . '+' . $name['surname'];
	}
}
