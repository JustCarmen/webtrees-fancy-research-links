<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class FindAGravePlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Find a Grave';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return 'INT';
	}

	public static function researchLink($name): string
    {
		return 'https://www.findagrave.com/cgi-bin/fg.cgi?page=gsr&GSfn=' . $name['first'] . '&GSmn=&GSln=' . $name['surname'] . '&GSbyrel=all&GSby=&GSdyrel=all&GSdy=&GScntry=0&GSst=0&GSgrid=&df=all&GSob=n';
	}
}
