<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ArchievenPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Archieven.nl';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');
	}

	public static function researchLink($name): string
    {
		return 'https://www.archieven.nl/nl/zoeken?mivast=0&mizig=310&miadt=0&milang=nl&misort=dt|asc&miview=tbl&mip3=' . $name['surn'] . '&mip2=' . $name['prefix'] . '&mip1=' . $name['givn'];
	}
}
