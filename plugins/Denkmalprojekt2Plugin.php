<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class Denkmalprojekt2Plugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Denkmalprojekt (Google)';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'DEU';
	}

	public static function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://www.google.de/search?hl=de&as_q=' . $name['surname'] . '&as_epq=&as_oq=' . $name['givn'] . '&as_eq=&as_nlo=&as_nhi=&lr=&cr=&as_qdr=all&as_sitesearch=denkmalprojekt.org&as_occt=any&safe=images&as_filetype=&as_rights=';
	}
}
