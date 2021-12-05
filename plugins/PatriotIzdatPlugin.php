<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class PatriotIzdatPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Книга памяти. Списки погибших в период и после 1945 года, 1923-1940, 1946-1982 (ссылка)';
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
		return 'http://www.patriot-izdat.ru/memory/memorybook/';
    }
}
