<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FamilySearchPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Family Search';
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

		return 'https://www.familysearch.org/search/record/results?q.givenName=' . $name['givn'] . '&q.surname=' . $name['surname'];
	}
}
