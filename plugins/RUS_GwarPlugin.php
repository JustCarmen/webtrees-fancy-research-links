<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RUS_GwarPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Первая Мировая Война'; /*World War I*/
    }

    public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public function researchArea(): string
    {
        return 'RUS';
    }

    public function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://gwar.mil.ru/heroes/?last_name=' . $name['surn'] . '&first_name=' . $name['givn'];
    }
}
