<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZL_WaitakiDCCemDBPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Waitaki District Council Cemetery Database (' . I18N::translate('link only') . ')';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NZL';
	}

	public function researchLink(): string
    {
		return 'https://www.waitaki.govt.nz/Services/Cemeteries/Cemetery-search-and-maps/Cemetery-search';
	}
}
