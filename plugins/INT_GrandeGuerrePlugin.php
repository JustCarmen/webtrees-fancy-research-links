<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_GrandeGuerrePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Prisoners of the First World War';
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

		return 'https://grandeguerre.icrc.org/en/File/Search#/3/2/107/0/British%20and%20Commonwealth/Military/' . $name['surn'];
	}
}
