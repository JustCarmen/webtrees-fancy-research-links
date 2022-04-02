<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class OpenArchievenZoekBidprentjesPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Open Archieven (' . I18N::translate('search prayer cards') . ')';
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

		return 'https://www.openarch.nl/search.php?lang=nl&name=' . $name['first'] . '+' . $name['surname'] . '&sourcetype=Bidprentjesverzameling';
    }
}
