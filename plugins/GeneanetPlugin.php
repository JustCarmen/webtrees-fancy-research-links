<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class GeneanetPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Geneanet.org';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink($attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://www.geneanet.org/fonds/individus/?go=1&nom=' . $name['surname'] . '&prenom=' . $name['givn'] . '&prenom_operateur=or&with_variantes_nom=&with_variantes_nom_conjoint=&with_variantes_prenom=&with_variantes_prenom_conjoint=&size=10';
	}
}
