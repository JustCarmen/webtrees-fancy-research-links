Fancy Research Links for webtrees
=================================

[![Latest Release](https://img.shields.io/github/release/JustCarmen/webtrees-fancy-research-links.svg)][1]
[![webtrees major version](https://img.shields.io/badge/webtrees-v2.x-green)][2]
[![Downloads](https://img.shields.io/github/downloads/JustCarmen/webtrees-fancy-research-links/total.svg)]()

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=XPBC2W85M38AS&item_name=webtrees%20modules%20by%20JustCarmen&currency_code=EUR)

Introduction
-----------
A sidebar module that provides quick links to popular research web sites, using the individuals name as the search reference.

Look in the plugins folder to get a quick overview of the plugins (research links) available.

You can extend the list of possible research sites by making your own plugin. You can use an existing plugin from the plugins folder as starting point.

A quick guide to add your own plugin:

1. Take a copy of one of the existing files from the plugins folder and rename it. Note: not all plugin files are exactly the same. Some use more variables than others. This depends on the research site the link points to.

2. In the new file, change the classname to match the file name and change the name and label of the link to something suitable.

3. Go to the research site you want to make a link to. Perform a simple name only search and note the URL the search generates. Use this URL to make a dynamic link in your new plugin file. Enter the link at the 'createLink' section, taking careful notes where the variables need to be inserted.

4. If you made a plugin that could be interesting for other users you can do a pull request or send me a copy.

If you have trouble creating your own link, you can open a new issue and request that a link be created for you.

Translations
------------
You can help to translate this module. The language files are at [POEditor][3] where you can update them. Or use a local editor, like poeditor or notepad++ to make the translations and send them back to me. You can do this via a pull request (if you know how) or by e-mail. Updated translations will be included in the next release of this module.

Installation & upgrading
------------------------
Unpack the zip file and place the folder jc-fancy-research-links in the modules_v4 folder of webtrees. Upload the newly added folder to your server. It is activated by default. Go to the control panel to set some options. You'll find the Fancy Research Links configuration page in the Sidebar section and on the module page.

Configuration
------------------------
All links are listed on the Fancy Research Links configuration page, where you have the following options:
'- Select the plugins you want to use in the sidebar (default = all);
'- Select the area you want to be expanded (default = 'International');
'- Select whether or not the Fancy Research Links sidebar should be expanded (default = collapsed);
   _Webtrees sets the Family Navigator expanded by default, while all other sidebar sections are collapsed. When doing research as an editor or higher, it could be handy to have the Fancy Research section expanded._
'- Select whether or not the links should open in a new tab (default = links open in the same tab).

Bugs and feature requests
-------------------------
If you experience any bugs or have a feature request for this module you can [create a new issue][4].

 [1]: https://github.com/JustCarmen/webtrees-fancy-research-links/releases/latest
 [2]: https://webtrees.github.io/download/
 [3]: https://poeditor.com/join/project?hash=VLrxy3AG3A
 [4]: https://github.com/JustCarmen/webtrees-fancy-research-links/issues?state=open

