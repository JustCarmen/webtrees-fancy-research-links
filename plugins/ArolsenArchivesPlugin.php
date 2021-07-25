<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ArolsenArchivesPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Arolsen Archives';
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
        return 'https://collections.arolsen-archives.org/en/search/?s=' . $name['surn'];
    }
}
