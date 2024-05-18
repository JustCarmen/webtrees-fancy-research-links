<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NLD_MensenlinqPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Mensenlinq';
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

		return 'https://mensenlinq.nl/overlijdensberichten/?' .
		'first_name=' . $name['first'] . '&last_name=' . $name['surname'] .
		'&passed_date_from=1970-01-01&passed_date_to=' . date('Y-m-d');
	}
}
