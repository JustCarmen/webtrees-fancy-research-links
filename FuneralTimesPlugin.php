<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FuneralTimesPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Funeral Times';
    }

    public function pluginName(): string
    {
        return strtolower(basename(__FILE__, 'Plugin.php'));
    }

    public function researchArea(): string
    {
        return 'IRL';
    }

    public function researchLink($attributes): string
    {
        // This uses the search syntax from the 2023 version of Funeral Times

        $name = $attributes['NAME'];

        return 'https://www.funeraltimes.com/death-notices/1/10/-/' . $name['surname'] . '/' . $name['first'] . '/-/-/-/-/-/DA/-';
    }
}
