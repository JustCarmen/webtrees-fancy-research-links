<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class RijksarchiefBelgiePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Rijksarchief België';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Belgium');
	}

	public static function researchLink($name): string
    {
		return 'http://search.arch.be/nl/zoeken-naar-personen/zoekresultaat/q/persoon_achternaam_t_0/' . $name['surname'] . '/q/persoon_voornaam_t_0/' . $name['givn'] . '/q/zoekwijze/s?M=0&V=0&O=0&persoon_0_periode_soort=&persoon_0_periode_geen=0';
	}
}
