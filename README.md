Fancy Research Links
====================

Fancy Research Links Module for webtrees 1.5x

The development version of the module requires [webtrees 1.5.2](https://github.com/fisharebest/webtrees).

Download the latest stable release for webtrees 1.5.1 here: https://github.com/JustCarmen/fancy_research_links/releases/tag/1.5.1.2

Description
-----------
A sidebar module that provides quick links to popular research web sites, using the individuals name as the search reference. There is a base stylesheet added to the module which should work with any theme.

At the moment mainly Dutch research web sites and a few others are added as plugin. [Here](https://github.com/JustCarmen/fancy_research_links/tree/master/plugins) you can get a quick overview of the plugins currently available in the development version. Plugins not available yet in the latest release will be available in the next release.

You can extend the list of possible research sites by making your own plugin. Look in the pluginfolder of the module for examples.

A quick guide to add your own plugin:

1. Take a copy of one of the existing files from the modules plugin folder and rename it. Note: not all plugin files are exactly the same. Some have more variables depending on the research site they are linking to.

2. In the new file, change the class to match the file name and change the name of the link to something suitable.

3. At the research site you are linking to, perform a simple name only search, and note the URL the search generates. Use this to change the output of the link in your new plugin file, the section starting with return $link = ...... taking careful note where the variables need to be inserted.

4. If you made a plugin that could be interesting for other users you can do a pull request or send me a copy.

On the Fancy Research Links configuration page (new in version 1.5.2) you can select the plugins you want to use in the sidebar.

Installation, updating and translations
---------------------------------------
For more information about these subjects go to the JustCarmen help pages: http://www.justcarmen.nl/help

Bugs and feature requests
-------------------------
If you experience any bugs or have a feature request for this module you can [create a new issue](https://github.com/JustCarmen/fancy_research_links/issues?state=open) or [use the webtrees subforum 'customising'](http://www.webtrees.net/index.php/en/forum/4-customising) to contact me.

