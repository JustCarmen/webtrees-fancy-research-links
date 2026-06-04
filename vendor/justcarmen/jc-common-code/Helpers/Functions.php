<?php

/**
 * Functions to be used in custom modules for webtrees by JustCarmen
 */

declare(strict_types=1);

namespace JustCarmen\Webtrees\Helpers;

use Fisharebest\Webtrees\Registry;
use Fisharebest\Webtrees\Webtrees;

/**
 * Functions to be used in custom modules for webtrees by JustCarmen
 */
class Functions
{

    /**
     * A breaking change in webtrees 2.2.0 changes how the classes are retrieved.
     * This function allows support for both 2.1.X and 2.2.X versions
     * @param string $class
     * @return mixed
     */
    static function getClass(string $class)
    {
        if (version_compare(Webtrees::VERSION, '2.2.0', '>=')) {
            return Registry::container()->get($class);
        } else {
            return app($class);
        }
    }
};
