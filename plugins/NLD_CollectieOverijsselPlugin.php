<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class NLD_CollectieOverijsselPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'Collectie Overijssel';
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

	public function researchLink(array $attributes): string
	{
		$name 		= $attributes['NAME'];
		$searchname = $name['givn'];
		$searchname .= ' ' . $name['surname'];
		$searchname = rawurlencode($searchname);

		return 'https://collecties.collectieoverijssel.nl/zoeken/groep=Personen/Vrij_zoeken=' . $searchname;
	}
}
