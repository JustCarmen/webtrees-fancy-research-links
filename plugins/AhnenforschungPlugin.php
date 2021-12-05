<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class AhnenforschungPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
	{
		return 'Ahnenforschung.net';
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

		return 'http://ahnenforschung.net/metasuche.php?query=' . $name['surname'];
	}
}
