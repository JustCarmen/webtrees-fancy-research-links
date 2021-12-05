<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class VictimsUSSRPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Жертвы политического террора в СССР (ссылка)';
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
		return 'http://lists.memo.ru/';
    }
}
