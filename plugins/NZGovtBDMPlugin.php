<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZGovtBDMPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Search New Zealand Births, Deaths &, Marriages Registers';
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
		return 'https://www.bdmhistoricalrecords.dia.govt.nz/search/';
	}
}
