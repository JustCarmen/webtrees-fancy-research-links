<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RUS_JMemoryPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Книга памяти воинов-евреев (1941-1945)'; /*World War I*/
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

		return 'http://jmemory.org/page1.php?family=' . $name['surn'] . '&letters=&send=ПОИСК';
    }
}
