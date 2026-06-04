<?php

/**
 * justcarmen/jc-common-code:
 * Library to share common code between custom modules for webtrees by JustCarmen
 *
 * Based on: webtrees-common by Jefferson49
 */

$search = str_replace('/', DIRECTORY_SEPARATOR,'/justcarmen/jc-common-code');
$dir    = str_replace($search,  '', __DIR__);
$loader = new Composer\Autoload\ClassLoader($dir);

try {
    $autoload_common_library_version = Composer\InstalledVersions::getVersion('justcarmen/jc-common-code');
}
catch (\OutOfBoundsException $e) {
    $autoload_common_library_version = '';
}

$local_composer_versions = require $dir . '/composer/installed.php';
$local_common_library_version = $local_composer_versions['versions']['justcarmen/jc-common-code']['version'];

//If the found library is later than the current autoload version, prepend the found library to autoload
//This ensures that always the latest library version is autoloaded
if (version_compare($local_common_library_version, $autoload_common_library_version, '>')) {
    $loader->addPsr4('JustCarmen\\Webtrees\\Helpers\\', __DIR__ . '/Helpers');
    $loader->addPsr4('JustCarmen\\Webtrees\\Internationalization\\', __DIR__ . '/Internationalization');
    $loader->addPsr4('JustCarmen\\Webtrees\\Service\\',  __DIR__ . '/Service');
    $loader->addPsr4('JustCarmen\\Webtrees\\Traits\\',  __DIR__ . '/Traits');
    $loader->register(true);
}
