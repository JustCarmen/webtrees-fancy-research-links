<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class PodvigNarodaPlugin extends FancyResearchLinksModule
{
    public function pluginLabel(): string
    {
        return 'Банк документов "Подвиг народа (ссылка)"';
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
		return 'http://podvignaroda.ru/?#tab=navPeople_search';
    }
}
