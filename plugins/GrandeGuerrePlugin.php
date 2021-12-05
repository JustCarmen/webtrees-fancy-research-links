<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GrandeGuerrePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Prisoners of the First World War';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink($name): string
    {
		return 'https://grandeguerre.icrc.org/en/File/Search#/3/2/107/0/British%20and%20Commonwealth/Military/' . $name['surn'];
	}
}
