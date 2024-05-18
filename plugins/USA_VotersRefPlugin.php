<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class USA_VotersRefPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'USA Voters Reference';
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
		$searchname = $name['givn'];
		if (!empty($name['msurname'])) {
			$searchname .= ' ' . $name['msurname']; // gives usually a better result for married women
		} else {
			$searchname .= ' ' . $name['surname'];
		}
		$searchname = str_replace(' ', '+', $searchname);

		return 'https://voteref.com/voters?state_name=&query_type=voter&q=' . $searchname;
	}
}
