<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class CAN_NecroCanadaPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Necrocanada.com (' . I18N::translate('link only') . ')';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'CAN';
	}

	public function researchLink(): string
    {
		return 'https://necrocanada.com';
	}
}
