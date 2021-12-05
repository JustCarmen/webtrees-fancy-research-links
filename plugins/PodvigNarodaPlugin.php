<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class PodvigNarodaPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Банк документов "Подвиг народа (ссылка)"';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'RUS';
    }

    public static function researchLink($attributes): string
    {
		return 'http://podvignaroda.ru/?#tab=navPeople_search';
    }
}
