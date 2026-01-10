<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class NZL_ASHResearchPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Ancestor Search Helper';
	}

	public function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public function researchArea(): string
    {
		return 'NZL';
	}

	public function researchLink(array $attributes): string
    {
		$name = $attributes['NAME'];

		return 'https://ash.howison.co.nz/?name=' . $name['givn'] . '+' . $name['surname'];
	}
}
