<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks\Plugin;

use Fisharebest\Webtrees\I18N;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

class PamyatNarodaPlugin extends FancyResearchLinksModule
{
    public static function pluginLabel(): string
    {
        return 'Память народа';
    }

    public static function pluginName(): string
	{
		return strtolower(basename(__FILE__, 'Plugin.php'));
	}

    public static function researchArea(): string
    {
        return 'RUS';
    }

    public static function researchLink($attributes): string
    {
        $name = $attributes['NAME'];

		return 'https://pamyat-naroda.ru/heroes/?last_name=' . $name['surn'] . '&group=all&types=pamyat_commander:nagrady_nagrad_doc:nagrady_uchet_kartoteka:nagrady_ubilein_kartoteka:pdv_kart_in:pdv_kart_in_inostranec:pamyat_voenkomat:potery_vpp:pamyat_zsp_parts:kld_ran:kld_bolezn:kld_polit:kld_upk:kld_vmf:potery_doneseniya_o_poteryah:potery_gospitali:potery_utochenie_poter:potery_spiski_zahoroneniy:potery_voennoplen:potery_iskluchenie_iz_spiskov:potery_kartoteki:potery_rvk_extra:potery_isp_extra:same_doroga&page=1&grouppersons=1&first_name=' . $name['givn'];
    }
}
