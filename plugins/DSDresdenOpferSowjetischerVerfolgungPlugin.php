<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DSDresdenOpferSowjetischerVerfolgungPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Dokumentationsstelle Dresden - Deutsche Opfer sowjetischer Verfolgung';
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

		return 'https://www.stsg.de/cms/dokstelle/rehabilitierung/datenbank-rehabilitierte-verurteilte?suchwort=' . $name['surn'] . '&teil=Datenbank+durchsuchen';
    }
}
