<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RootsWebPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Rootsweb';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('International');
	}

	public static function researchLink($name): string
    {
		return 'https://worldconnect.rootsweb.ancestry.com/cgi-bin/igm.cgi?op=Search&lang=en&surname=' . $name['surname'] . '&stype=Exact&given=' . $name['givn'] . '&brange=0&drange=0&mrange=0&period=All&submit.x=Search';
	}

	public static function encodePlus() {
		return true;
	}
}
