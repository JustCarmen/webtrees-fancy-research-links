<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

/**
 * Søgning på efternavn i Wads Sedler.
 * Mest anvendelig med lidt sjældnere efternavne.
 */

use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DNK_WadsSedlerPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Wads Sedler';
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

        return 'https://sedler.dis-danmark.dk/wad/vis_navne.php?page_id=14&stil=2&navn=' . $name['surn'] . '&sort=e&ret=12';
    }
}