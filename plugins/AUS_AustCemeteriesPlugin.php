<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AUS_AustCemeteriesPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Australian Cemeteries';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'AUS';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'http://www.austcemindex.com/?given_names=' . $name['givn'] . '&family_name=' . $name['surn'];
    }
}
