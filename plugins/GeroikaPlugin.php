<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GeroikaPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Пошук в базі даних військових УНР (посилання)';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'UKR';
    }

    public static function researchLink($attributes): string
    {
		return 'http://www.db.geroika.org.ua/ua/search.html';
    }
}
