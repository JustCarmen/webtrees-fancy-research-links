<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class BancaDatiCadutiDispersiPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Banca Dati dei Caduti e Dispersi  (' . I18N::translate('link only') . ')';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'ITA';
	}

	public static function researchLink($attributes): string
    {
        return 'https://www.difesa.it/Il_Ministro/CadutiInGuerra/Pagine/default.aspx';

	}
}
