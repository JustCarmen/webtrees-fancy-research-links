<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DSDresdenGefangeneKonzentrationslagerPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Dokumentationsstelle Dresden - Gefangene früher NS-Konzentrationslager in Sachsen (1933-1937)';
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

		return 'https://www.stsg.de/cms/dokstelle/auskuenfte/fruehe-ns-kz-sachsen-1933-1937/datenbank-fruehe-ns-kz-sachsen-1933-1937?suchwort=' . $name['surn'] . '&teil=Datenbank+durchsuchen';
    }
}
