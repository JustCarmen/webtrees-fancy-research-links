<?php

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

require_once __DIR__ . '/autoload.php';

$files = array_merge( glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . '*.php'),
                      glob(__DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'MyPlugins' . DIRECTORY_SEPARATOR . '*.php'));

foreach ($files as $file) {
    require($file);
}

return new FancyResearchLinksModule();
