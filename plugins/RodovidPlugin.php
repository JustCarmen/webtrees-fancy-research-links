<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RodovidPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Rodovid'; // rodovid.org Google search
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink($name): string
    {
		return 'https://cse.google.com/cse?cx=partner-pub-7138679064258925:9991898506&ie=UTF-8&q=' . $name['fullNN'] . '&sa=Search';
	}
}
