<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_MyHeritagePlugin extends FancyResearchLinksModule
{
  	public function pluginLabel(): string
    {
		return 'MyHeritage ($)';
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
		$name = $attributes['NAME'];
		$year = $attributes['YEAR'];
		$place = $attributes['PLACE'];

		// MyHeritage encodes a space in the url as '%2F3'
		$givn 	 = str_replace(" ", "%2F3", $name['givn']);
		$surname = str_replace(" ", "%2F3", $name['surname']);

		(string)$yob = '';
		foreach ($year as $key => $value) {
			if (!empty($value)) {
				$yob = $value;
				break;
			}
		}

		(string)$pob = '';
		foreach ($place as $key => $value) {
			if (!empty($value)) {
				$pob = $value;
				break;
			}
		}

		return 'https://www.myheritage.com/research?s=1&formId=master&formMode=1&useTranslation=1&exactSearch=&p=1&action=query&' .
		'view_mode=card&qname=Name+fn.' . e($givn) . '+ln.' . e($surname) . '&qevents-event1=Event+et.birth+ey.' . e($yob) .
		'+me.true+mer.10&qevents-any%2F1event_1=Event+et.any+ep.' . e($pob) . '+epmo.similar&qevents=List';
	}
}
