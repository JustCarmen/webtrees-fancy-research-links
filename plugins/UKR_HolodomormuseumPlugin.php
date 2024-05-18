<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class UKR_HolodomormuseumPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Єдиний реєстр жертв Голодомору (посилання)'; /*Unified Register of the Holodomor victims*/
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'UKR';
    }

    public function researchLink($attributes): string
    {
		return 'https://holodomormuseum.org.ua/iedynyj-reiestr-zhertv-holodomoru/';
    }
}
