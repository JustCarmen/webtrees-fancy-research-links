<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZL_BDCCemDBPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Buller District City Council Cemetery Database (' . I18N::translate('link only') . ')';
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

		return 'https://bullerdc.govt.nz/do-it-online/find-a-cemetery-record?surname=' . $name['surname'] . '&forenames=' . $name['givn'] . '&cemetery=&yearFrom=' . $df . '&yearTo=' . $dt;
	}
}
