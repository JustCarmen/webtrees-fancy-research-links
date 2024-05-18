<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Fritekstsøgning på efternavn i Københavns Stadsarkiv.
 * Mest anvendelig med lidt sjældnere efternavne.
 */

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DNK_KbhArkivPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Københavns Stadsarkiv';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'DNK';
    }

    public function researchLink($attributes): string
    {
    $name = $attributes['NAME'];

        return 'https://kbharkiv.dk/brug-samlingerne/soeg-i-indtastede-kilder/results?q1.f=freetext_store&q1.op=in_multivalued&q1.t=' . $name['surn'];
    }
}
