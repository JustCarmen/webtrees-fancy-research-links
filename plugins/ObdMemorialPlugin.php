<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ObdMemorialPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'ОБД Мемориал';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'RUS';
    }

    public static function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://obd-memorial.ru/html/search.htm?f=' . $name['surn'] . '&n=' . $name['givn'] . '&s=&y=&r=';
    }
}
