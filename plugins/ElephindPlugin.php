<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class ElephindPlugin extends FancyResearchLinksModule
{
	public static function pluginLabel(): string
    {
		return 'Elephind Newspapers';
	}

	public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

	public static function researchArea(): string
    {
		return I18N::translate('International');
	}

	public static function researchLink($name): string
    {
		return 'https://www.elephind.com/?a=q&hs=1&r=1&results=1&txq=' . $name['first'] . '+' . $name['surname'] . '&txf=txINtxCO&o=10&dafyq=&dafmq=&dafdq=&datyq=&datmq=&datdq=&puqname=Search+all+titles...&puq=&lcq=&csq=&e=-------en-10--1--txt-txINtxCO----------';
	}

	public static function encodePlus() {
		return true;
	}
}
