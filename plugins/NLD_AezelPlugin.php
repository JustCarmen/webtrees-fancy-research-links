<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_AezelPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Aezel (Erfgoed Limburg)';
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

		return 'https://aezel.eu/onderzoeken/personen?naam1=' .$name['surname'] . '&pagina=1&sort=datum&order=1&voornamen1=' . $name['givn'] . '';
	}
}
