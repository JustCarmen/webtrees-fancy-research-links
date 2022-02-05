<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DelpherPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Delpher Krantenarchief';
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

		return 'https://www.delpher.nl/nl/kranten/results?query=' . urlencode('"') . $name['first'] . ' ' . $name['surname'] . urlencode('"') . '&coll=ddd';
	}
}
