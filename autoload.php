<?php

/**
 * This autoload function is based on the autoload function from ChangeLanguageWithURL by Jefferson49
 */

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Composer\Autoload\ClassLoader;

//Autoload vendor
//Needs to be autoloaded before the common code library, because otherwise the prepended library will be removed
//require_once __DIR__ . '/vendor/autoload.php';

//Autoload the latest version of the common code library, which is shared between custom modules by JustCarmen.
require_once __DIR__ . '/vendor/justcarmen/jc-common-code/autoload.php';

//Autoload this webtrees custom module
$loader = new ClassLoader(__DIR__);
$loader->addPsr4('JustCarmen\\Webtrees\\Module\\FancyResearchLinks\\', __DIR__);
$loader->register();
