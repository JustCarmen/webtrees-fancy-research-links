Fancy Research Links for webtrees
=================================

[![Latest Release](https://img.shields.io/github/release/JustCarmen/webtrees-fancy-research-links.svg)][1]
[![webtrees major version](https://img.shields.io/badge/webtrees-v2.2.x-green)][2]
[![Downloads](https://img.shields.io/github/downloads/JustCarmen/webtrees-fancy-research-links/total.svg)]()

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=XPBC2W85M38AS&item_name=webtrees%20modules%20by%20JustCarmen&currency_code=EUR)

Introduction
-----------
A sidebar module that provides shortcuts to popular research websites, using the individual data as a search reference.

Look in [the plugins folder][3] to get a quick overview of the available plugins (research links).

You can expand the list of possible research sites by creating your own plugin. To get started you can use an existing plugin from the plugins folder or take [the empty plugin template][4] from the examples folder.

A guide to add your own plugin:

1. Take a copy of one of the existing files from the plugins folder or copy the empty plugin from the examples folder and rename it. Give it a recognizable name. Note that not all plugin files are exactly the same. Some use more variables than others. This depends on the research site to which the link refers. Open several plugins to see how they are configured.
2. In the new file, change the class name to match the file name and change the plugin label to something appropriate. The plugin label is the text used in the research links lists.
3. If a search site is limited to a particular country, set the plugin's research area with the official 3 letter country code. Look in [the webtrees function getAllCountries][5] for a list of available codes. Use 'INT' for 'International' in case of an international search site.
4. Go to the research site you want to make a link to. Perform your search and note the URL the search generates. Use this URL to create a dynamic link in your new plugin file. Enter the link in the ‘researchLink’ section, carefully noting where to insert the variables.
5. The $attributes collection is the parameter used in the researchLinks function. This $attributes collection contain 3 sub collections:
   - $name = $attributes['NAME'];
   - $year = $attributes['YEAR'];
   - $place = $attributes['PLACE'];
   - $country = $attributes['COUNTRY'];

   With one or more of those variables declared you have the following list of variables available to use in your own plugin:
   - Full name = $name[‘fullNN’] e.g. "John Michael van den Burgh"
   - Full given name = $name[‘givn’] e.g. "John Michael"
   - First name = $name[‘first’] e.g. "John"
   - Last name with prefix = $name[‘surname’] e.g. "van den Burgh"
   - Last name without prefix = $name[‘surn’] e.g. "Burgh"
   - Prefix = $name[‘prefix’] e.g. "van den"
   - Married name	= $name['msurname'] e.g. "de Vries"
   - Birth year/place/country = $year['BIRT'] e.g. "1800" / $place['BIRT]	e.g. "Chicago" / $country['BIRT'] e.g. "USA"
   - Christening year/place/country = $year['CHR]	e.g. "1800" / $place['CHR]	e.g. "Chicago" / $country['CHR'] e.g. "USA"
   - Baptism year/place/country = $year['BAPM]	e.g. "1800" / $place['BAPM]	e.g. "Chicago" / $country['BAPM'] e.g. "USA"
   - Death year/place/country = $year['DEAT'] e.g. "1880" / $place['DEAT]	e.g. "New York" / $country['DEAT'] e.g. "USA"
   - Burial year/place/country = $year['BURI] e.g. "1880" / $place['BURI]	e.g. "New York" / $country['BURI'] e.g. "USA"
   - Cremation year/place/country = $year['CREM] e.g. "1880" / $place['CREM]	e.g. "New York" / $country['CREM'] e.g. "USA"
6. The Examples folder contains a sample plugin for a Google search that uses special name parts and uses the year of birth/death and the place of birth/death in the search with explanation.
7. If you want to use this example plugin (modified or as is), just copy it to the root of the Plugins folder. The expample folder also contains an empty plugin with all the functions you need to create your own.
8. If you have created a plugin that may be of interest to other users you can make a pull request or send me a copy.

If you have problems creating your own link, you can open a new issue and request that a link be created for you.

Translations
------------
You can help to translate this module. The language files are on [POEditor][6] where you can update them. Or use a local editor, like Poedit or Notepad++ to make the translations and send them back to me. You can do this via a pull request or via [email][7]. Updated translations will be included in the next version of this module.

Installation & upgrading
------------------------
Unpack the zip file and place the folder jc-fancy-research-links in the modules_v4 folder of webtrees. Upload the newly added folder to your server. It is activated by default. Go to the control panel to set some options. You can find the Fancy Research Links configuration page in the Sidebar section and on the module page.

Configuration
------------------------
All links are listed on the Fancy Research Links configuration page, where you have the following options:
- Select the plugins you want to use in the sidebar (default = all).
- Select the area you want to expand (default = 'International').
- Select whether or not to expand the Fancy Research Links sidebar (default = collapsed).
   _Webtrees sets the Family Navigator as unfolded by default, while all other sidebar sections are collapsed. When doing research as an editor or above, it may be helpful to have the Fancy Research section unfolded._
- Select whether or not to open the links in a new tab (default = links open in the same tab).

Bugs and feature requests
-------------------------
If you are experiencing bugs or have a feature request for this module, please [create a new issue][8].

 [1]: https://github.com/JustCarmen/webtrees-fancy-research-links/releases/latest
 [2]: https://webtrees.net/
 [3]: https://github.com/JustCarmen/webtrees-fancy-research-links/tree/main/plugins
 [4]: https://github.com/JustCarmen/webtrees-fancy-research-links/blob/main/plugins/example/EmptyPlugin.php
 [5]: https://github.com/fisharebest/webtrees/blob/main/app/Statistics/Service/CountryService.php
 [6]: https://poeditor.com/join/project?hash=VLrxy3AG3A
 [7]: mailto:carmen@justcarmen.nl
 [8]: https://github.com/JustCarmen/webtrees-fancy-research-links/issues?state=open

