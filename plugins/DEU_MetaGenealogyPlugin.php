<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class DEU_MetaGenealogyPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return I18N::translate('Genealogy.net Meta Search');
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'DEU';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$plac = $attributes['PLACE'];

		$place = '';

		if (!empty($plac['BIRT'])) {
			$place = '&placename=' . $plac['BIRT'];
		}
		else if (!empty($plac['DEAT'])) {
			$place = '&placename=' . $plac['DEAT'];
		}

		return 'https://meta.genealogy.net/metasearch/search?lastname=' . $name['surname'] . $place;
	}
}
