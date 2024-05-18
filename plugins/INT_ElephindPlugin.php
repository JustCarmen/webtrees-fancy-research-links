<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class INT_ElephindPlugin extends FancyResearchLinksModule
{
	public function pluginLabel(): string
    {
		return 'Elephind Newspapers';
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

		return 'https://www.elephind.com/?a=q&hs=1&r=1&results=1&txq=' . $name['first'] . '+' . $name['surname'] . '&txf=txINtxCO&o=10&dafyq=&dafmq=&dafdq=&datyq=&datmq=&datdq=&puqname=Search+all+titles...&puq=&lcq=&csq=&e=-------en-10--1--txt-txINtxCO----------';
	}
}
