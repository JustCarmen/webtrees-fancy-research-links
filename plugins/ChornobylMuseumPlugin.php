<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ChornobylMuseumPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Книга пам`яті учасників ліквідації аварії на ЧАЕС (посилання)';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'UKR';
    }

    public static function researchLink($name): string
    {
        return 'http://memory.chornobylmuseum.kiev.ua/searchform.php';
    }
}
