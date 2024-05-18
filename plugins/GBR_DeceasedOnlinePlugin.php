<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GBR_DeceasedOnlinePlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Deceased Online';
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
		$name = $attributes['NAME'];

		return 'https://www.deceasedonline.com/servlet/GSDOSearch?' . 'GSDOInptSName=' . $name['surname'] . '&GSDOInptFName=' . $name['first'];
	}
}
