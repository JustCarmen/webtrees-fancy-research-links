<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_HaagsGemeentearchiefPlugin extends FancyResearchLinksModule
{
  	public function pluginLabel(): string
    {
		return 'Haags Gemeentearchief';
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

		return 'https://haagsgemeentearchief.nl/genealogy/personenoverzicht?mivast=59&miadt=59&mizig=100&miview=tbl&milang=nl&micols=1' .
			   '&mip1=' . $name['surn'] .
			   '&mip2=' . $name['prefix'] .
			   '&mip3=' . $name['givn'];
	}
}
