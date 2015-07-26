Fancy Research Links
====================

Fancy Research Links Module for webtrees.

This module requires [webtrees 1.7.0](https://github.com/fisharebest/webtrees) or later. Download the latest stable release of this module [here](https://github.com/JustCarmen/fancy_research_links/releases/tag/1.7.1).

Description
-----------
A sidebar module that provides quick links to popular research web sites, using the individuals name as the search reference. There is a base stylesheet added to the module which should work with any theme.

[Here](http://www.justcarmen.nl/fancy-research-links-link-list/) you can get a quick overview of the plugins (search links) available. The plugins are grouped by search area.

You can extend the list of possible research sites by making your own plugin. Look in the src/Plugin folder of the module for examples.

A quick guide to add your own plugin:

1. Take a copy of one of the existing files from the modules plugin folder and rename it. Note: not all plugin files are exactly the same. Some have more variables depending on the research site they are linking to.

2. In the new file, change the class to match the file name and change the name of the link to something suitable.

3. At the research site you are linking to, perform a simple name only search, and note the URL the search generates. Use this to change the output of the link in your new plugin file, in the 'createLink' section taking careful note where the variables need to be inserted.

4. If you made a plugin that could be interesting for other users you can do a pull request or send me a copy.

If you still have troubles creating your own link, you can open a new issue and do a request.

On the Fancy Research Links configuration page you can select the plugins you want to use in the sidebar.

Installation, updating and translations
---------------------------------------
For more information about these subjects go to the JustCarmen help pages: http://www.justcarmen.nl/help

Bugs and feature requests
-------------------------
If you experience any bugs or have a feature request for this module you can [create a new issue](https://github.com/JustCarmen/fancy_research_links/issues?state=open) or [use the webtrees subforum 'customising'](http://www.webtrees.net/index.php/en/forum/4-customising) to contact me.

