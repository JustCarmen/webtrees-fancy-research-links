<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

// settings: http://localhost/hetverschil.info/webtrees/module/_jc-fancy-research-links_/Admin
class WeRelatePlugin extends FancyResearchLinksModule
{

  /**
   * The plugin label is used in the sidebar
   *
   * @return string
   */
	public function pluginLabel(): string
    {
		return 'We Relate';
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
		return 'INT';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$searchname = 'g='. str_replace(' ', '+', $name['givn']);
		$searchname .= '&s=' . str_replace(' ', '+', $name['surname']);
		return 'https://www.werelate.org/wiki/Special:Search?sort=score&ns=All&a=&st=&'.$searchname. '&p=&bd=&br=0&bp=&dd=&dr=0&dp=&fg=&fs=&mg=&ms=&sg=&ss=&hg=&hs=&wg=&ws=&md=&mr=0&mp=&pn=&li=&su=&sa=&t=&k=&rows=200&ecp=c';
	}
}
