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
		return 'https://mensenlinq.nl/overlijdensberichten/?passed_at_from=1970-01-01&passed_at_until=' .
		date('Y-m-d') . '&lastname=' . $name['surname'] . '&firstname=' . $name['first'] . '&advanced=1&filtered=true';
	}
}
