<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Fisharebest\Webtrees\Registry;

require __DIR__ . '/FancyResearchLinksModule.php';

$files = glob( __DIR__ . '/plugins/*.php');
foreach ($files as $file) {
    require($file);
}

return Registry::container()->get(FancyResearchLinksModule::class);
