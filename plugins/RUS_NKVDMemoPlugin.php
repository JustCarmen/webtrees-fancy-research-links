<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RUS_NKVDMemoPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Кадровый состав НКВД';
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

		return 'https://nkvd.memo.ru/index.php?search=' . $name['surn'] . '+' . $name['givn'];
    }
}
