Fancy Research Links for webtrees
=================================

[![Latest Release](https://img.shields.io/github/release/JustCarmen/webtrees-fancy-research-links.svg)][1]
[![webtrees major version](https://img.shields.io/badge/webtrees-v2.2.x-green)][2]
[![Downloads](https://img.shields.io/github/downloads/JustCarmen/webtrees-fancy-research-links/total.svg)]()

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=XPBC2W85M38AS&item_name=webtrees%20modules%20by%20JustCarmen&currency_code=EUR)

Introduction
------------
Fancy Research Links is a sidebar module for webtrees that adds quick links to popular research websites using the individual’s data as search parameters.

Browse the available plugins in [the plugins folder][3] to see the built-in research links.

You can expand the list of supported research sites by creating your own plugin. Start from an existing plugin in the plugins folder or use the empty template in [the examples folder][4].

Creating your own plugin
-----------------------
Follow these steps to add a custom research link:

1. Copy an existing plugin from the plugins folder, or copy the empty plugin template from the examples folder and rename it. Give it a clear name so it is easy to recognize later.
2. Change the class name to match the file name, and update the plugin label to something appropriate. The label is the text shown in the research links list.
3. If the search site is limited to a specific country, set the plugin’s research area with the official 3-letter country code. See [the getAllCountries function][5] for the available codes. Use `INT` for international searches.
4. Go to the research site you want to include and perform a search. Note the URL that is generated. Use that URL as the basis for your dynamic link in the plugin file. Add it in the `researchLink` section and be careful with the variable placeholders.
5. The `$attributes` collection is passed to the `researchLinks` function. It contains these sub-collections:
   - `$name = $attributes['NAME'];`
   - `$year = $attributes['YEAR'];`
   - `$place = $attributes['PLACE'];`
   - `$country = $attributes['COUNTRY'];`

   The following variables are available for use in your plugin:
   - Full name: `$name['fullNN']` (for example, `John Michael van den Burgh`)
   - Full given name: `$name['givn']` (for example, `John Michael`)
   - First name: `$name['first']` (for example, `John`)
   - Last name with prefix: `$name['surname']` (for example, `van den Burgh`)
   - Last name without prefix: `$name['surn']` (for example, `Burgh`)
   - Prefix: `$name['prefix']` (for example, `van den`)
   - Married name: `$name['msurname']` (for example, `de Vries`)
   - Birth year/place/country: `$year['BIRT']`, `$place['BIRT']`, `$country['BIRT']`
   - Christening year/place/country: `$year['CHR']`, `$place['CHR']`, `$country['CHR']`
   - Baptism year/place/country: `$year['BAPM']`, `$place['BAPM']`, `$country['BAPM']`
   - Death year/place/country: `$year['DEAT']`, `$place['DEAT']`, `$country['DEAT']`
   - Burial year/place/country: `$year['BURI']`, `$place['BURI']`, `$country['BURI']`
   - Cremation year/place/country: `$year['CREM']`, `$place['CREM']`, `$country['CREM']`

   The module also supports additional calendar systems. Add the calendar suffix to the event name, for example:
   - `$year['BIRT_julian']`
   - `$year['DEAT_jewish']`
   - `$year['BURI_french']`
   - `$year['BAPM_hijri']`
   - `$year['CHR_jalali']`

   You do not need a suffix for the default Gregorian calendar.
6. The examples folder contains a sample plugin for a Google search. It demonstrates how to use special name parts, plus the birth/death year and place in a search URL.
7. If you want to use this example plugin, either as-is or after modifying it, copy it to the main plugins folder or to the MyPlugins folder. More information about the MyPlugins folder is available [here][9]. The examples folder also contains an empty plugin with all the functions needed to create your own custom link.
8. If you create a plugin that may be useful to other users, place it in the main plugins folder and submit a pull request or send it to me.

If you are having trouble creating a link, please open a new issue and ask for a custom link to be added.

Translations
------------
You can help translate this module. The language files are available on [POEditor][6] where you can contribute updates. Alternatively, use a local editor such as Poedit or Notepad++ to edit the translations, then send them back to me via pull request or [email][7]. Updated translations will be included in the next module release.

Installation
-------------------------
Install using [Custom Module Manager][10] for an easy and convenient way to install webtrees custom modules.
Open the Custom Module Manager in webtrees, scroll to “Fancy Research Links”, and click “Install Module”.

### Manual installation
Download the [latest release][11] of the module. Unpack the ZIP file and place the folder `jc-fancy-research-links` in the `modules_v4` folder of webtrees. Upload the new folder to your server. The module is enabled by default. Go to the control panel to adjust the options. You can find the Fancy Research Links configuration page in the Sidebar section and on the module page.

### Install using Composer
If you are using the webtrees source code, you can install this module with Composer:

```bash
composer require justcarmen/jc-fancy-research-links
```

Configuration
-------------
All links are listed on the Fancy Research Links configuration page, where you can choose the following options:
- Select which plugins to use in the sidebar (default: all)
- Select the research area to expand (default: `International`)
- Choose whether to expand the Fancy Research Links sidebar by default (default: collapsed)
  _Webtrees keeps the Family Navigator open by default, while other sidebar sections are collapsed. When researching as an editor or above, it may be helpful to leave the Fancy Research section open._
- Choose whether links open in a new tab (default: open in the same tab)

Bugs and feature requests
-------------------------
If you are experiencing bugs or have a feature request for this module, please [create a new issue][8].

[1]: https://github.com/JustCarmen/webtrees-fancy-research-links/releases/latest
[2]: https://webtrees.net/
[3]: https://github.com/JustCarmen/webtrees-fancy-research-links/tree/main/plugins
[4]: https://github.com/JustCarmen/webtrees-fancy-research-links/blob/main/plugins/example/EmptyPlugin.php
[5]: https://github.com/JustCarmen/jc-common-code/blob/main/Service/CountryService.php
[6]: https://poeditor.com/join/project?hash=VLrxy3AG3A
[7]: mailto:carmen@justcarmen.nl
[8]: https://github.com/JustCarmen/webtrees-fancy-research-links/issues?state=open
[9]: https://github.com/JustCarmen/webtrees-fancy-research-links/tree/main/plugins/MyPlugins/README.md
[10]: https://github.com/Jefferson49/CustomModuleManager
[11]: https://github.com/JustCarmen/webtrees-fancy-research-links/releases/latest

