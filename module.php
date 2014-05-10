<?php
/*
 * Fancy Research Links Module
 *
 * webtrees: Web based Family History software
 * Copyright (C) 2014 webtrees development team.
 * Copyright (C) 2014 JustCarmen.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 */

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class fancy_research_links_WT_Module extends WT_Module implements WT_Module_Config, WT_Module_Sidebar {

	public function __construct() {
		parent::__construct();
		// Load any local user translations
		if (is_dir(WT_MODULES_DIR.$this->getName().'/language')) {
			if (file_exists(WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.mo')) {
				WT_I18N::addTranslation(
					new Zend_Translate('gettext', WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.mo', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.php')) {
				WT_I18N::addTranslation(
					new Zend_Translate('array', WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.php', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.csv')) {
				WT_I18N::addTranslation(
					new Zend_Translate('csv', WT_MODULES_DIR.$this->getName().'/language/'.WT_LOCALE.'.csv', WT_LOCALE)
				);
			}
		}
	}

	// Extend WT_Module
	public function getTitle() {
		return /* I18N: Name of the module */ WT_I18N::translate('Fancy Research Links');
	}

	public function getSidebarTitle() {
		return /* Title used in the sidebar */ WT_I18N::translate('Research links');
	}

	// Extend WT_Module
	public function getDescription() {
		return /* I18N: Description of the module */ WT_I18N::translate('A sidebar tool to provide quick links to popular research web sites.');
	}

	// Extend WT_Module_Config
	public function modAction($mod_action) {
		switch($mod_action) {
		case 'admin_config':
			$this->config();
			break;
		case 'admin_reset':
			$this->frl_reset();
			$this->config();
			break;
		default:
			header('HTTP/1.0 404 Not Found');
		}
	}

	// Implement WT_Module_Config
	public function getConfigLink() {
		return 'module.php?mod='.$this->getName().'&amp;mod_action=admin_config';
	}

	// Reset all settings to default
	private function frl_reset() {
		WT_DB::prepare("DELETE FROM `##module_setting` WHERE setting_name LIKE 'FRL%'")->execute();
		\WT\Log::addConfigurationLog($this->getTitle().' reset to default values');
	}

	// Configuration page
	private function config() {
		require WT_ROOT.'includes/functions/functions_edit.php';
		$controller=new WT_Controller_Page;
		$controller
			->restrictAccess(\WT\Auth::isAdmin())
			->setPageTitle(WT_I18N::translate('Fancy Research Links'))
			->pageHeader()
			->addInlineJavascript('
				jQuery("head").append("<style>input{vertical-align:middle;margin-right:8px}h3{margin-bottom:10px}</style>");');

		if (WT_Filter::postBool('save')) {
			set_module_setting($this->getName(), 'FRL_PLUGINS',  serialize(WT_Filter::post('NEW_FRL_PLUGINS')));
			\WT\Log::addConfigurationLog($this->getTitle().' config updated');
		}

		$FRL_PLUGINS = unserialize(get_module_setting($this->getName(), 'FRL_PLUGINS'));
		$html = '	<h2>'.$controller->getPageTitle().'</h2>
					<form method="post" name="configform" action="'.$this->getConfigLink().'">
					<input type="hidden" name="save" value="1">';
		$html .= '	<h3>'.WT_I18N::translate('Check the plugins you want to use in the sidebar').'</h3>';
					foreach ($this->getPluginList() as $plugin) {
						if(is_array($FRL_PLUGINS) && array_key_exists(get_class($plugin), $FRL_PLUGINS)) $value = $FRL_PLUGINS[get_class($plugin)];
						if(!isset($value)) $value = '1';
		$html .=			'<div class="field">'.two_state_checkbox('NEW_FRL_PLUGINS['.get_class($plugin).']', $value).'<label>'.$plugin->getName().'</label></div>';
						}
		$html .= '		<div class="buttons">
							<input type="submit" value="'.WT_I18N::translate('Save').'" />
							<input type="reset" value="'.WT_I18N::translate('Reset').'" onclick="if (confirm(\''.WT_I18N::translate('The settings will be reset to default. Are you sure you want to do this?').'\')) window.location.href=\'module.php?mod='.$this->getName().'&amp;mod_action=admin_reset\';"/>
						</div>
					</form>';
		// output
		ob_start();$html .= ob_get_clean();echo $html;
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
		$html = $this->includeCss(WT_MODULES_DIR.$this->getName().'/style.css');

		$controller->addInlineJavascript('
			jQuery("#'.$this->getName().' a").text("'.$this->getSidebarTitle().'");
			jQuery("#research_status a.mainlink").click(function(e){
				e.preventDefault();
				jQuery(this).parent().find(".sublinks").toggle();
			});
		');

		$FRL_PLUGINS = unserialize(get_module_setting($this->getName(), 'FRL_PLUGINS'));
		$html .= '<ul id="research_status">';
		foreach ($this->getPluginList() as $plugin) {
			if(is_array($FRL_PLUGINS) && array_key_exists(get_class($plugin), $FRL_PLUGINS)) $value = $FRL_PLUGINS[get_class($plugin)];
			if(!isset($value)) $value = '1';
			if($value == true) {
				foreach ($controller->record->getFacts() as $key=>$value) {
					$fact = $value->getTag();
					if ($fact=="NAME") {
						$primary = $this->getPrimaryName($value);
						if($primary) {

							// create plugin vars
							$givn 		= $this->encode($primary['givn'], $plugin->encode_plus()); // all given names
							$given		= explode(" ", $primary['givn']);
							$first		= $given[0]; // first given name
							$middle		= count($given) > 1 ? $given[1] : ""; // middle name (second given name)
							$surn 		= $this->encode($primary['surn'], $plugin->encode_plus()); // surname without prefix
							$surname	= $this->encode($primary['surname'], $plugin->encode_plus()); // full surname (with prefix)
							$fullname 	= $plugin->encode_plus() ? $givn.'+'.$surname : $givn.'%20'.$surname; // full name
							$prefix		= $surn != $surname ? substr($surname, 0, strpos($surname, $surn) - 1) : ""; // prefix

							$link = $plugin->create_link($fullname, $givn, $first, $middle, $prefix, $surn, $surname);
							$sublinks = $plugin->create_sublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname);
						}
					}
				}
				if($sublinks) {
					$html.='<li><span class="ui-icon ui-icon-triangle-1-e left"></span><a class="mainlink" href="'.htmlspecialchars($link).'">'.$plugin->getName().'</a>';
					$html .= '<ul class="sublinks">';
					foreach ($sublinks as $sublink) {
						$html.='<li><span class="ui-icon ui-icon-triangle-1-e left"></span><a class="research_link" href="'.htmlspecialchars($sublink['link']).'" target="_blank">'.$sublink['title'].'</a></li>';
					}
					$html .= '</ul></li>';
				}
				else { // default
					$html.='<li><span class="ui-icon ui-icon-triangle-1-e left"></span><a class="research_link" href="'.htmlspecialchars($link).'" target="_blank">'.$plugin->getName().'</a></li>';
				}
			}
		}
		$html.= '</ul>';
		return $html;
	}

	private function encode($var, $plus) {
		$var = rawurlencode($var);
		return $plus ? str_replace("%20", "+", $var) : $var;
	}

	// Scan the plugin folder for a list of plugins
	private function getPluginList() {
		$array=array();
		$dir=dirname(__FILE__).'/plugins/';
		$dir_handle=opendir($dir);
		while ($file=readdir($dir_handle)) {
			if (substr($file, -4)=='.php') {
				require dirname(__FILE__).'/plugins/'.$file;
				$class=basename($file, '.php').'_plugin';
				$array[$class]=new $class;
			}
		}
		closedir($dir_handle);
		ksort($array);
		return $array;
	}

	// Based on function print_name_record() in /library/WT/Controller/Individual.php
	private function getPrimaryName(WT_Fact $event) {
		if (!$event->canShow()) {
			return false;
		}
		$factrec = $event->getGedCom();
		// Create a dummy record, so we can extract the formatted NAME value from the event.
		$dummy=new WT_Individual(
			'xref',
			"0 @xref@ INDI\n1 DEAT Y\n".$factrec,
			null,
			WT_GED_ID
		);
		$all_names=$dummy->getAllNames();
		return $all_names[0];
	}

	private function includeCss($css) {
		return
			'<script>
				if (document.createStyleSheet) {
					document.createStyleSheet("'.$css.'"); // For Internet Explorer
				} else {
					var newSheet=document.createElement("link");
					newSheet.setAttribute("href","'.$css.'");
					newSheet.setAttribute("type","text/css");
					newSheet.setAttribute("rel","stylesheet");
					document.getElementsByTagName("head")[0].appendChild(newSheet);
				}
			</script>';
	}

}

// Each plugin should extend the base_plugin class, and implement any functions included here
class research_base_plugin {
}

