<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OorlogsbronnenPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Oorlogsbronnen';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink($attributes): string

    {
		$name = $attributes['NAME'];

		return 'https://www.oorlogsbronnen.nl/mensen?firstname=' . $name['first'] . '&lastname=' . $name['surname'];
	}
}
