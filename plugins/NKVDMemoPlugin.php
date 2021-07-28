<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NKVDMemoPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Кадровый состав НКВД';
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
        return 'https://nkvd.memo.ru/index.php?search=' . $name['surn'] . '+' . $name['givn'];
    }
}
