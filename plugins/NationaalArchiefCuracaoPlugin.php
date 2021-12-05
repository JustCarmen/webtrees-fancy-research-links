<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NationaalArchiefCuracaoPlugin extends FancyResearchLinksModule
{

	public function pluginLabel(): string
	{
		return 'Nationaal Archief Curacao (' . I18N::translate('link only') . ')';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
	{
		return 'INT';
	}

	public function researchLink($attributes): string
	{
		return 'https://www.nationaalarchief.cw/api/picturae/genealogie';
	}
}
