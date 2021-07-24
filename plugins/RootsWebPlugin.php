<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RootsWebPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Rootsweb (link only)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink(): string
    {
		return 'https://wc.rootsweb.com/search';
	}
}
