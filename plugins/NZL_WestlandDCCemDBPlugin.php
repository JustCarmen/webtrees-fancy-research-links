<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZL_WestlandDCCemDBPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Westland District Council Cemetery Database';
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
		return 'https://www.westlanddc.govt.nz/do-it-online/search-databases/find-a-cemetery-record/';
	}
}
