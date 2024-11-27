<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Fisharebest\Webtrees\Registry;
use Fisharebest\Webtrees\Webtrees;

require __DIR__ . '/FancyResearchLinksModule.php';

$files = glob( __DIR__ . '/plugins/*.php');
foreach ($files as $file) {
    require($file);
}

if (version_compare(Webtrees::VERSION, '2.2.0', '>=')) {
    return Registry::container()->get(FancyResearchLinksModule::class);
}
else {
    return app(FancyResearchLinksModule::class);
}
