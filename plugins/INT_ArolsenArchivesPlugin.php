<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_ArolsenArchivesPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Arolsen Archives';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'INT';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://collections.arolsen-archives.org/en/search/?s=' . $name['first'] . ' ' . $name['surn'];
    }
}
