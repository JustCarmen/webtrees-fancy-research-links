<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NederlandsBidprentjesArchiefPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Nederlands Bidprentjes Archief';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NLD';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];

                return 'https://bidprentjesarchief.nl/?zNaam=' . $name['first'] . '&zANaam=' . $name['surname'] . '&zGeslacht=X&zGebdat=' . $year['BIRT'] . '&zGebdatVergelijking=%3D&zGebplaats=&zOvldat=' . $year['DEAT'] . '&zOvldatVergelijking=%3D&zOvlplaats=&zLeeftijd=&zLeeftijdVergelijking=%3D&zRelatie=&zOCRTekst=&zNieuw=X&Submit=Zoekopdracht+uitvoeren&Search=advanced&pagina=nba-search-form';
	}
}
