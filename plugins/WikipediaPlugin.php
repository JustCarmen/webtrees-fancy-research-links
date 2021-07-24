<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class WikipediaPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Wikipedia';
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
		$language = substr(I18N::languageTag(), 0, 2);
		return 'https://' . $language . '.wikipedia.org/wiki/' . $name['first'] . '_' . $name['surname'];
	}
}
