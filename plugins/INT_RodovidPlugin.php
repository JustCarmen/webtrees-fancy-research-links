<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_RodovidPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Rodovid'; // rodovid.org Google search
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

		return 'https://cse.google.com/cse?cx=partner-pub-7138679064258925:9991898506&ie=UTF-8&q=' . $name['fullNN'] . '&sa=Search';
	}
}
