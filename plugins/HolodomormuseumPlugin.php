<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class HolodomormuseumPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Єдиний реєстр жертв Голодомору (посилання)'; /*Unified Register of the Holodomor victims*/
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
        return 'https://holodomormuseum.org.ua/iedynyj-reiestr-zhertv-holodomoru/';
    }
}
