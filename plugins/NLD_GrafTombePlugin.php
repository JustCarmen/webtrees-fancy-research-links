<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_GrafTombePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Graftombe';
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

		// for a correct search the prefix should be put after the surname (surn)
		$name['surname'] = $name['prefix'] ? $name['surn'] . ' ' . $name['prefix'] : $name['surn'];

		return 'https://www.graftombe.nl/names/search?forename=' . $name['givn'] . '&surname=' . $name['surname'] . '&submit=Zoeken&r=names-search';
	}
}
