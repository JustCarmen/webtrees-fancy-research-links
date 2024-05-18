<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_ZeeuwsArchiefPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Zeeuws archief';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://www.zeeuwsarchief.nl/onderzoek-het-zelf/archief/?mivast=239&miadt=239&mizig=862&miview=tbl&milang=nl' .
		'&micols=1&mip3=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip1=' . $name['givn'];
	}
}
