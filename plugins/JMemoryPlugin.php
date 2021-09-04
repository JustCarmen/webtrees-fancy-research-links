<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class JMemoryPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Книга памяти воинов-евреев (1941-1945)'; /*World War I*/
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'RUS';
    }

    public static function researchLink($name): string
    {
        return 'http://jmemory.org/page1.php?family=' . $name['surn'] . '&letters=&send=ПОИСК';
    }
}
