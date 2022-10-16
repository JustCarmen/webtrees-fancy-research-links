<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class WhitePagesPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'White Pages';
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
		return 'USA';
	}

	public function researchLink($attributes): string
	{
		$name = $attributes['NAME'];

		$searchname = '/name/';
		$searchname .= $name['first'] . '-' . $name['surname'] . '?fs=1&searchedName=';
		$searchname .= urlencode($name['first'] . ' ' . $name['surname']);

		return 'https://www.whitepages.com' . $searchname;
	}
}
