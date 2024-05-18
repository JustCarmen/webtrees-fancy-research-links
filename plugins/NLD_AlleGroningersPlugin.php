<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class NLD_AlleGroningersPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'AlleGroningers';
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
		$name = $attributes['NAME'];
		$searchname = $name['givn'];
		$searchname .= ' ' . $name['surname'];

		$searchname = urlencode('{"q":"' . $searchname . '"}');

		return 'https://www.allegroningers.nl/zoeken-op-naam/persons?ss=' . $searchname;
	}
}
