<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class USA_AncientFacesPlugin extends FancyResearchLinksModule
{

	/**
	 * The plugin label is used in the sidebar
	 *
	 * @return string
	 */
	public function pluginLabel(): string
	{
		return 'Ancient Faces';
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
		$year = $attributes['YEAR'];

		if ($name['msurname']) {
			$lastname = $name['msurname'];
			$maidenname = $name['surname']; // the first name listed, could be the married name but we assume not.
		} else {
			$lastname = $name['surname'];
			$maidenname = '';
		}

		$searchname = 'first_name=' . $name['first'];
		$searchname .= '&last_name=' . $lastname;
		$searchname .= '&maiden_name=' . $maidenname;
		$searchname .= '&yob=' . $year['BIRT'] . '&yob-exact=on&yob-exact-mirror=on&yob-approx=5';
		$searchname .= '&yod=' . $year['DEAT'] . '&yod-exact=on&yod-exact-mirror=on&yod-approx=5';
		$searchname .= '&search_type=search-bio';

		return 'https://www.ancientfaces.com/search?' . $searchname;
	}
}
