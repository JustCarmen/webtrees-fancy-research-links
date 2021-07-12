Fancy Research Links for webtrees
=================================

[![Latest Release](https://img.shields.io/github/release/JustCarmen/webtrees-fancy-research-links.svg)][1]
[![webtrees major version](https://img.shields.io/badge/webtrees-v2.x-green)][2]
[![Downloads](https://img.shields.io/github/downloads/JustCarmen/webtrees-fancy-research-links/total.svg)]()

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=XPBC2W85M38AS&item_name=webtrees%20modules%20by%20JustCarmen&currency_code=EUR)

Introduction
-----------
A sidebar module that provides quick links to popular research web sites, using the individuals name as the search reference. There is a base stylesheet added to the module which should work with any theme.

Look in the plugin folder to get a quick overview of the plugins (research links) available.

You can extend the list of possible research sites by making your own plugin. Look in the src/Plugin folder of the module for examples.

A quick guide to add your own plugin:

1. Take a copy of one of the existing files from the modules plugin folder and rename it. Note: not all plugin files are exactly the same. Some have more variables depending on the research site they are linking to.

2. In the new file, change the class to match the file name and change the name of the link to something suitable.

3. At the research site you are linking to, perform a simple name only search, and note the URL the search generates. Use this to change the output of the link in your new plugin file, in the 'createLink' section taking careful note where the variables need to be inserted.

4. If you made a plugin that could be interesting for other users you can do a pull request or send me a copy.

If you still have troubles creating your own link, you can open a new issue and do a request.

On the Fancy Research Links configuration page you can select the plugins you want to use in the sidebar.

Translations
------------
You can help to translate this module. Use a local editor, like poeditor or notepad++ to make the translations and send them back to me. You can do this via a pull request (if you know how) or by e-mail. Updated translations will be included in the next release of this module.

Installation & upgrading
------------------------
Unpack the zip file and place the folder jc-fancy-research-links in the modules_v4 folder of webtrees. Upload the newly added folder to your server. It is activated by default. Go to the control panel to set some options.

Bugs and feature requests
-------------------------
If you experience any bugs or have a feature request for this module you can [create a new issue on GitHub][4].

 [1]: https://github.com/JustCarmen/webtrees-fancy-research-links/releases/latest
 [2]: https://webtrees.github.io/download/
 [4]: https://github.com/JustCarmen/webtrees-fancy-research-links/issues?state=open

