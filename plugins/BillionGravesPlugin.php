<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class BillionGravesPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Billion Graves';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink($name, $birth, $death): string
    {
		return 'https://billiongraves.com/search/results?given_names=' .
		$name['givn'] . '&family_names=' . $name['surname'] . '&birth_year=' . $birth['year'] .
		'&death_year=' . $death['year'] . '&year_range=5';
	}
}
