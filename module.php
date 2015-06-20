<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * Copyright (C) 2015 JustCarmen
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace JustCarmen\WebtreesAddOns\Module\FancyResearchLinks;

use Composer\Autoload\ClassLoader;
use Fisharebest\Webtrees\Database;
use Fisharebest\Webtrees\Filter;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Log;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use Fisharebest\Webtrees\Module\ModuleSidebarInterface;
use JustCarmen\WebtreesAddOns\Module\FancyResearchLinks\Template\AdminTemplate;

class FancyResearchLinksModule extends AbstractModule implements ModuleConfigInterface, ModuleSidebarInterface {

	/** @var array primary name */
	var $primary;

	public function __construct() {
		parent::__construct('fancy_research_links');

		// register the namespace
		$loader = new ClassLoader();
		$loader->addPsr4('JustCarmen\\WebtreesAddOns\\Module\\FancyResearchLinks\\', WT_MODULES_DIR . $this->getName() . '/src');
		$loader->register();
	}

	// Extend WT_Module
	public function getTitle() {
		return /* I18N: Name of the module */ I18N::translate('Fancy Research Links');
	}

	public function getSidebarTitle() {
		return /* Title used in the sidebar */ I18N::translate('Research links');
	}

	// Extend WT_Module
	public function getDescription() {
		return /* I18N: Description of the module */ I18N::translate('A sidebar tool to provide quick links to popular research web sites.');
	}

	// Extend WT_Module_Config
	public function modAction($mod_action) {
		switch ($mod_action) {
			case 'admin_config':
				if (Filter::postBool('save')) {
					$this->setSetting('FRL_PLUGINS', serialize(Filter::post('NEW_FRL_PLUGINS')));
					Log::addConfigurationLog($this->getTitle() . ' config updated');
				}
				$template = new AdminTemplate;
				return $template->pageContent();
			case 'admin_reset':
				Database::prepare("DELETE FROM `##module_setting` WHERE setting_name LIKE 'FRL%'")->execute();
				Log::addConfigurationLog($this->getTitle() . ' reset to default values');
				header('Location: ' . $this->getConfigLink());
				break;
			default:
				http_response_code(404);
				break;
		}
	}

	// Implement WT_Module_Config
	public function getConfigLink() {
		return 'module.php?mod=' . $this->getName() . '&mod_action=admin_config';
	}

	// Implement WT_Module_Sidebar
	public function defaultSidebarOrder() {
		return 9;
	}

	// Implement WT_Module_Sidebar
	public function hasSidebarContent() {
		return true;
	}

	// Implement WT_Module_Sidebar
	public function getSidebarAjaxContent() {
		return false;
	}

	// Implement WT_Module_Sidebar
	public function getSidebarContent() {
		// code based on similar in function_print_list.php
		global $controller;

		// load the module stylesheet
		$html = $this->includeCss(WT_MODULES_DIR . $this->getName() . '/style.css');

		$controller->addInlineJavascript('
			jQuery("#' . $this->getName() . ' a").text("' . $this->getSidebarTitle() . '");
			jQuery("#research_status a.mainlink").click(function(e){
				e.preventDefault();
				jQuery(this).parent().find(".sublinks").toggle();
			});
		');

		$count = 0;
		$FRL_PLUGINS = unserialize($this->getSetting('FRL_PLUGINS'));
		$html .= '<ul id="research_status" dir="ltr">';
		foreach (FancyResearchLinksClass::getPluginList() as $plugin_label => $plugin) {
			if (is_array($FRL_PLUGINS) && array_key_exists($plugin_label, $FRL_PLUGINS)) {
				$value = $FRL_PLUGINS[$plugin_label];
			}
			if (!isset($value)) {
				$value = '1';
			}
			if ($value == true) {
				foreach ($controller->record->getFacts() as $value) {
					$fact = $value->getTag();
					if ($fact == "NAME") {
						$this->primary = FancyResearchLinksClass::getPrimaryName($value);
						break; // only use the first fact with a NAME tag found.
					}
				}

				if ($this->primary) {
					$link = $plugin->createLink(FancyResearchLinksClass::getNames($this->primary, $plugin->encodePlus()));
					$html.='<li><i class="icon-research-link"></i><a class="research_link" href="' . Filter::escapeHtml($link) . '" target="_blank">' . $plugin->getPluginName() . '</a></li>';
					$count++;
				}
			}
		}
		$html.= '</ul>';

		if ($count === 0) {
			$html = I18N::translate('There are no research links available for this individual.');
		}
		return $html;
	}

	private function includeCss($css) {
		return
			'<script>
				if (document.createStyleSheet) {
					document.createStyleSheet("' . $css . '"); // For Internet Explorer
				} else {
					var newSheet=document.createElement("link");
					newSheet.setAttribute("href","' . $css . '");
					newSheet.setAttribute("type","text/css");
					newSheet.setAttribute("rel","stylesheet");
					document.getElementsByTagName("head")[0].appendChild(newSheet);
				}
			</script>';
	}

}

return new FancyResearchLinksModule;
