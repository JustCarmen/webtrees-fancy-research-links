<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class LegacyPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'Legacy.com obituaries';
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
		$lastname = $name['msurname'] ? $name['msurname'] : $name['surname'];

		$searchname = '&firstname=' . urlencode($name['first']);
		$searchname .= '&lastname=' . urlencode($lastname);

		return 'https://www.legacy.com/obituaries/omaha/obituary-search.aspx?daterange=99999' . $searchname . '&countryid=1&stateid=all&affiliateid=all';
	}
}
