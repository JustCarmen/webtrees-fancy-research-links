<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ITA_PortaleAntenatiPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Portale Antenati';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'ITA';
	}

	public function researchLink($attributes): string

    {
		$name = $attributes['NAME'];
		$nome = $name['first'];
		$cognome = $name['surn'];

		$place = $attributes['PLACE'];
		$natain = $place['BIRT'];
		$spentain = $place['DEAT'];
		$riposain = $place['BURI'];

		$anno = $attributes['YEAR'];
		$annonascita = $anno['BIRT'];
		$annomorte = $anno['DEAT'];

		return 'https://antenati.cultura.gov.it/search-nominative/?cognome=' . $cognome
		. '&s_facet_query=nome_s%3A' . $nome
		. '&%252Clocalita_ss%3A' . $natain
		. '&%252CestremoRemoto_i%3A' . $annonascita;

	}
}
