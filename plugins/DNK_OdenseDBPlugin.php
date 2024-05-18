<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DNK_OdenseDBPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Odensedatabasen';
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

        return 'https://www.odensedatabasen.dk/kilde/begivenhed?fornavn=' . $name['first'] . '&efternavn=' . $name['surn'];
    }
}
