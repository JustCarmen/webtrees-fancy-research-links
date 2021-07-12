<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DelpherPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Delpher Krantenarchief';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');;
	}

	public static function researchLink($name): string
    {
		return 'https://www.delpher.nl/nl/kranten/results?query=' . urlencode('"') . $name['first'] . ' ' . $name['surname'] . urlencode('"') . '&coll=ddd';
	}

	public static function encodePlus() {
		return true;
	}
}
