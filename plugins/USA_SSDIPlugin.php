<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class USA_SSDIPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return '<span title="Please note that married women are usually registered under their married surname">SSDI (Social Security Death Index)</span>';
	}

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

return 'https://www.familysearch.org/search/record/results?count=20&q.birthLikeDate.from=' . $year['BIRT'] . '&q.birthLikeDate.to=' . $year['BIRT'] . '&q.givenName=' . $name['first'] . '&q.surname=' . $name['surname'] . '&q.surname.1=' . $name['msurname'] . '&f.collectionId=1202535';
	}
}

