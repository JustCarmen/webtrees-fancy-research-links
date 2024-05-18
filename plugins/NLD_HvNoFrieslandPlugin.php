<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class NLD_HvNoFrieslandPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'Historische Vereniging Noordoost-Friesland';
	}

	/**
	 * The plugin name is the internal name and is generated automatically
	 *
	 * @return string
	 */
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
		$name 		 = $attributes['NAME'];
		$searchname  = 'mylastname=' . urlencode($name['surname']) . '&lnqualify=contains';
		$searchname .= '&myfirstname=' . urlencode($name['givn']) . '&fnqualify=contains';

		return 'https://www.hvnf.nl/genealogie/search.php?mybool=AND&nr=50&' . $searchname;
	}
}
