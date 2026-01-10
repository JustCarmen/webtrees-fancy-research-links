<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZL_CODCCemDBPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Central Otago Council Cemetery Database';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NZL';
	}

	public function researchLink(array $attributes): string
    {
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];

		$df = ((int)$year['DEAT']) < 1000 ? '' : (int)$year['DEAT']-1;
        $dt = ((int)$year['DEAT']) < 1000 ? '' : (int)$year['DEAT']+1;

		return 'https://www.codc.govt.nz/do-it-online/cemetery-record-search?surname=' . $name['surname'] . '&forenames=' . $name['givn'] . '&cemetery=&yearFrom=' . $df . '&yearTo=' . $dt;
	}
}
