<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RIPIEPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'RIP.ie';
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
        // This uses the search syntax from the 2023 version of RIP.ie

        $name = $attributes['NAME'];

        return 'https://rip.ie/death-notice/s/all?page=1&firstname=' . $name['first'] . '&surname=' . $name['surname'];
    }
}
