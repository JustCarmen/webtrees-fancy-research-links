<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class MensenlinqPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Mensenlinq';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('Netherlands');;
	}

	public static function researchLink($name): string
    {
		return 'https://www.mensenlinq.nl/site/advertentie/overzicht?advzoek_vandag=01&advzoek_vanmaand=01&advzoek_vanjaar=2006&advzoek_totdag=' . date("d") . '&advzoek_totmaand=' . date("m") . '&advzoek_totjaar=' . date("Y") . '&advzoek_dag=' . date("d") . '&advzoek_maand=' . date("m") . '&advzoek_jaar=' . date("Y") . '&advzoek_provincie=&advzoek_titel=&advzoek_zoek=' . $name['surname'] . '&advzoek_plaats=&advzoek_voornaam=' . $name['first'] . '&advzoek_geboorteplaats=';
	}
}
