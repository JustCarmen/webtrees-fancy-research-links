<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FindMyPastPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Findmypast ($)';
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

		return 'https://search.findmypast.com/search/world-records?firstname=' . $name['givn'] . '&firstname_variants=true&lastname=' . $name['surname'];
	}
}
