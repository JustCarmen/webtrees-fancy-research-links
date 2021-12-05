<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DSDresdenVerurteilteSowjetischerMilitaertribunalePlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Dokumentationsstelle Dresden - Todesurteile sowjetischer Militärtribunale gegen deutsche Zivilisten (1944–1947)';
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'DEU';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://www.stsg.de/cms/dokstelle/auskuenfte/verurteilte-sowjetischer-militaertribunale-smt/todesurteile-sowjetischer?suchwort=' . $name['givn'] . '&beginn=Name+beginnt+mit';
    }
}
