<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class BEL_MadeInAalstPlugin extends FancyResearchLinksModule
{
        public function pluginLabel(): string
    {
                return 'MadeInAalst';
        }

        public function pluginName(): string
        {
                return strtolower(basename(__FILE__, 'Plugin.php'));
        }

        public function researchArea(): string
    {
                return 'BEL';
        }

        public function researchLink($attributes): string
    {
                $name = $attributes['NAME'];

                return 'https://madeinaalst.be/collecties/genealogie/personen-zoeken/persons?ss={"q":"' .$name['fullNN'] . '"}';

        }
}
