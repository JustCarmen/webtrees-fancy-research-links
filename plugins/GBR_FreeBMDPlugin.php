<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GBR_FreeBMDPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'FreeBMD (' . I18N::translate('link only') . ')';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'GBR';
	}

	public function researchLink($attributes): string
    {
		return 'https://www.freebmd.org.uk/cgi/search.pl';
	}
}
