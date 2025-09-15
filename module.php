<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Fisharebest\Webtrees\Registry;

require __DIR__ . '/FancyResearchLinksModule.php';

$files = array_merge( glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . '*.php'),
                      glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'MyPlugins' . DIRECTORY_SEPARATOR . '*.php'));

foreach ($files as $file) {
    require($file);
}

return Registry::container()->get(FancyResearchLinksModule::class);
