<?php
declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;


class FRA_LibraMemoriaPlugin extends FancyResearchLinksModule
{

  /**
   * The plugin label is used in the sidebar
   *
   * @return string
   */
	public function pluginLabel(): string
    {
		return 'Libra Memoria, avis de décès';
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
		return 'FRA';
	}

	public function researchLink($attributes): string
    {
		$name = $attributes['NAME'];
		$date = urlencode(date('d/m/y'));
		$searchname = 'nom=' . str_replace(' ', '+', $name['surname']);
		$searchname .= '&prenom=' . str_replace(' ', '+', $name['givn']);

		return 'https://www.libramemoria.com/avis?' . $searchname . '&debut=&fin=' . $date . '&departement=&commune=&communeName=&titre=';
	}
}
