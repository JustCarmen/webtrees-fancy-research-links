<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Fisharebest\Webtrees\Registry;
use Fisharebest\Webtrees\Statistics\Service\CountryService;
use JustCarmen\Webtrees\Module\FancyResearchLinks\FancyResearchLinksModule;

require __DIR__ . '/FancyResearchLinksModule.php';

###The files on custom directory doesn't appear using GLOB_BRACE and GLOB_BRACE is not well supported always. It's better to stay away from it.
###$files = glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . '{*Plugin.php, custom' . DIRECTORY_SEPARATOR . '*Plugin.php}', GLOB_BRACE);
$files = array_merge( glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . '*Plugin.php'),
                      glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'custom' . DIRECTORY_SEPARATOR . '*Plugin.php'));

foreach ($files as $file) {
    require($file);
}

$countryService = FancyResearchLinksModule::getClass(CountryService::class);
return new FancyResearchLinksModule($countryService);   
