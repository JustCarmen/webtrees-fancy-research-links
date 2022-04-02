<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AchelseKluisBidprentjesPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return '<span title="You can ask for a scan of the prayer card on this page: https://www.hamontachel.com/bidprentjes-opzoeken/">Achelse Kluis (' . I18N::translate('prayer cards') . ')</span>';
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

		return 'https://hamont-achel.eu/wp-content/plugins/ID238405_bidpr/prentjes.php?quick_filter=' . $name['surname'] . '+' . $name['first'] . '&quick_filter_operator=Contains';
	}
}
