<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AhnenforschungPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
	{
		return 'Ahnenforschung.net';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
	{
		return I18N::translate('Germany');
	}

	public static function researchLink($name): string
	{
		return 'http://ahnenforschung.net/metasuche.php?query=' . $name['surname'];
	}
}
