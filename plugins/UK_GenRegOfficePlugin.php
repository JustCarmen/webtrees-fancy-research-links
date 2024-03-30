<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class UK_GenRegOfficePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'General Register Office (' . I18N::translate('link only') . ')';
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
		return 'https://www.gro.gov.uk/gro/content/certificates/indexes_search.asp';
	}
}
