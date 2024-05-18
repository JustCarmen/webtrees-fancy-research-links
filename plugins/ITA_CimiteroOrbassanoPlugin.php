<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ITA_CimiteroOrbassanoPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Cimitero Orbassano';
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

		return 'https://cimitero-orbassano.geo.pa.it/?q=anagrafe-cimiteriale&field_cognome_def_value=' . $cognome
		. '&field_nome_defunto_value=' . $nome;

	}
}
