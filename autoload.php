<?php

/**
 * This autoload function is based on the autoload function from ChangeLanguageWithURL by Jefferson49
 */

declare(strict_types=1);

namespace JustCarmen\Webtrees\Module\FancyResearchLinks;

use Composer\Autoload\ClassLoader;

//Autoload the latest version of the common code library, which is shared between custom modules by JustCarmen.
require_once __DIR__ . '/vendor/justcarmen/jc-common-code/autoload.php';

//Autoload this webtrees custom module
$loader = new ClassLoader(__DIR__);
$loader->addPsr4('JustCarmen\\Webtrees\\Module\\FancyResearchLinks\\', __DIR__);
$loader->register();
