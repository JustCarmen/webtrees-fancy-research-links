<?php

/**
 * MoreI18N class to reuse webtrees translations for custom modules
 *
 * justcarmen/jc-common-code:
 * Library to share common code between custom modules for webtrees by JustCarmen
 *
 * Use translations in custom modules where the translation is already expected to be done by main webtrees
 * e.g. in module configuration, where the main webtrees already translates the field labels, so no need to
 * translate again in the module
 *
 * Thanks to Richard Cissée (Vesta modules) and Markus Hemprich (Custom Module Manager) for the idea and
 * initial code which I adapted and slightly modified for the jc-common-code library
 */

declare(strict_types=1);

namespace JustCarmen\Webtrees\Internationalization;

use Fisharebest\Webtrees\I18N;

class MoreI18N {

    //functionally same as I18N::translate,
    //different name prevents gettext from picking this up
    //(intention: use where already expected to be translated via main webtrees)
    /**
     * @param string $message
     * @param mixed  ...$args
     */
    public static function xlate(string $message, ...$args): string {
        return I18N::translate($message, ...$args);
    }

    //functionally same as I18N::translateContext,
    //different name prevents gettext from picking this up
    //(intention: use where already expected to be translated via main webtrees)
    /**
     * @param string $context
     * @param string $message
     * @param mixed  ...$args
     */
    public static function xlateContext(string $context, string $message, ...$args): string {
        return I18N::translateContext($context, $message, ...$args);
    }

    //functionally same as I18N::plural,
    //different name prevents gettext from picking this up
    //(intention: use where already expected to be translated via main webtrees)
    /**
     * @param string $singular
     * @param string $plural
     * @param int    $count
     * @param mixed  ...$args
     */
    public static function xlatePlural(string $singular, string $plural, int $count, ...$args): string {
        return I18N::plural($singular, $plural, $count, ...$args);
    }

    /**
     * Translate a number into the local representation.
     * e.g. 12345.67 becomes
     * en: 12,345.67
     * fr: 12 345,67
     * de: 12.345,67
     *
     * @param float $n
     * @param int   $precision
     *
     * @return string
     */
    public static function number(float $n, int $precision = 0): string
    {
        return I18N::number($n, $precision);
    }
}
