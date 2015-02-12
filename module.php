<?php
namespace Fisharebest\Webtrees;

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

use Zend_Translate;

class fancy_research_links_WT_Module extends Module implements ModuleConfigInterface, ModuleSidebarInterface {

	public function __construct() {
		parent::__construct();
		// Load any local user translations
		if (is_dir(WT_MODULES_DIR . $this->getName() . '/language')) {
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo')) {
				I18N::addTranslation(
					new Zend_Translate('gettext', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php')) {
				I18N::addTranslation(
					new Zend_Translate('array', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv')) {
				I18N::addTranslation(
					new Zend_Translate('csv', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv', WT_LOCALE)
				);
			}
		}
		require_once WT_MODULES_DIR . $this->getName() . '/research_base_plugin.php';
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
				$this->config();
				break;
			case 'admin_reset':
				$this->resetAll();
				$this->config();
				break;
			default:
				http_response_code(404);
				break;
		}
	}

	// Implement WT_Module_Config
	public function getConfigLink() {
		return 'module.php?mod=' . $this->getName() . '&amp;mod_action=admin_config';
	}

	// Reset all settings to default
	private function resetAll() {
		Database::prepare("DELETE FROM `##module_setting` WHERE setting_name LIKE 'FRL%'")->execute();
		Log::addConfigurationLog($this->getTitle() . ' reset to default values');
	}

	// Configuration page
	private function config() {
		$controller = new PageController;
		$controller
			->restrictAccess(Auth::isAdmin())
			->setPageTitle(I18N::translate('Fancy Research Links'))
			->pageHeader()
			->addInlineJavascript('
					jQuery("head").append("<style>input{vertical-align:middle;margin-right:8px}h3{margin-bottom:10px}</style>");
					jQuery("input[name=select-all]").click(function(){
					if (jQuery(this).is(":checked") == true) {
						jQuery("#linklist").find(":checkbox").prop("checked", true).val(1);
						jQuery("input[id^=NEW_FRL_PLUGINS]").val(1);
					} else {
						jQuery("#linklist").find(":checkbox").prop("checked", false).val(0);
						jQuery("input[id^=NEW_FRL_PLUGINS]").val(0);
					}
					formChanged = true;
				});
			');

		if (Filter::postBool('save')) {
			$this->setSetting('FRL_PLUGINS', serialize(Filter::post('NEW_FRL_PLUGINS')));
			Log::addConfigurationLog($this->getTitle() . ' config updated');
		}

		$FRL_PLUGINS = unserialize($this->getSetting('FRL_PLUGINS'));
		?>
		<ol class="breadcrumb small">
			<li><a href="admin.php"><?php echo I18N::translate('Control panel'); ?></a></li>
			<li><a href="admin_modules.php"><?php echo I18N::translate('Module administration'); ?></a></li>
			<li class="active"><?php echo $controller->getPageTitle(); ?></li>
		</ol>
		<h2><?php echo $controller->getPageTitle(); ?></h2>
		<p class="small text-muted"><?php echo I18N::translate('Check the plugins you want to use in the sidebar'); ?></p>
		<form class="form-horizontal" method="post" name="configform" action="<?php echo $this->getConfigLink(); ?>">
			<input type="hidden" name="save" value="1">
			<!-- SELECT ALL -->
			<div class="checkbox-inline">
				<label>
					<?php echo checkbox('select-all') . I18N::translate('select all'); ?>
				</label>
				<?php // The datatable will be dynamically filled with images from the database.  ?>
			</div>
			<!-- RESEARCH LINKS -->
			<div id="linklist" class="form-group">
				<?php foreach ($this->getPluginList() as $plugin_label => $plugin): ?>
					<?php
					if (is_array($FRL_PLUGINS) && array_key_exists($plugin_label, $FRL_PLUGINS)) {
						$value = $FRL_PLUGINS[$plugin_label];
					} if (!isset($value)) {
						$value = '1';
					}
					?>
					<div class="checkbox col-xs-4">
						<label class="checkbox-inline">
							<?php echo two_state_checkbox('NEW_FRL_PLUGINS[' . $plugin_label . ']', $value) . ' ' . $plugin->getPluginName(); ?>
						</label>
					</div>
				<?php endforeach; ?>
			</div>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check"></i>
				<?php echo I18N::translate('Save'); ?>
			</button>
			<button type="reset" class="btn btn-primary" onclick="if (confirm('<?php echo I18N::translate('The settings will be reset to default. Are you sure you want to do this?'); ?>'))
								window.location.href = 'module.php?mod=<?php echo $this->getName(); ?>&amp;mod_action=admin_reset';">
				<i class="fa fa-recycle"></i>
				<?php echo I18N::translate('Reset'); ?>
			</button>
		</form>
		<?php
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
		$html .= '<ul id="research_status">';
		foreach ($this->getPluginList() as $plugin_label => $plugin) {
			if (is_array($FRL_PLUGINS) && array_key_exists($plugin_label, $FRL_PLUGINS)) {
				$value = $FRL_PLUGINS[$plugin_label];
			}
			if (!isset($value)) {
				$value = '1';
			}
			if ($value == true) {
				$primary = "";
				$name = false; // only use the first fact with a NAME tag.
				foreach ($controller->record->getFacts() as $value) {
					$fact = $value->getTag();
					if ($fact == "NAME" && !$name) {
						$primary = $this->getPrimaryName($value);
						$name = true;
					}
				}
				if ($primary) {
					// create plugin vars
					$givn = $this->encode($primary['givn'], $plugin->encode_plus()); // all given names
					$given = explode(" ", $primary['givn']);
					$first = $given[0]; // first given name
					$middle = count($given) > 1 ? $given[1] : ""; // middle name (second given name)
					$surn = $this->encode($primary['surn'], $plugin->encode_plus()); // surname without prefix
					$surname = $this->encode($primary['surname'], $plugin->encode_plus()); // full surname (with prefix)
					$fullname = $plugin->encode_plus() ? $givn . '+' . $surname : $givn . '%20' . $surname; // full name
					$prefix = $surn != $surname ? substr($surname, 0, strpos($surname, $surn) - 3) : ""; // prefix

					$link = $plugin->createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname);
					$sublinks = $plugin->createSublink($fullname, $givn, $first, $middle, $prefix, $surn, $surname);

					if ($sublinks) {
						$html.='<li><i class="icon-research-link"></i><a class="mainlink" href="' . htmlspecialchars($link) . '">' . $plugin->getPluginName() . '</a>';
						$html .= '<ul class="sublinks">';
						foreach ($sublinks as $sublink) {
							$html.='<li><i class="icon-research-link"></i><a class="research_link" href="' . htmlspecialchars($sublink['link']) . '" target="_blank">' . $sublink['title'] . '</a></li>';
						}
						$html .= '</ul></li>';
					} else { // default
						$html.='<li><i class="icon-research-link"></i><a class="research_link" href="' . htmlspecialchars($link) . '" target="_blank">' . $plugin->getPluginName() . '</a></li>';
					}
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

	private function encode($var, $plus) {
		$var = rawurlencode($var);
		return $plus ? str_replace("%20", "+", $var) : $var;
	}

	// Scan the plugin folder for a list of plugins - see: app/Module.php - getActiveModulesByComponent
	private function getPluginList() {
		$array = array();
		$dir = WT_MODULES_DIR . $this->getName() . '/plugins/';
		$dir_handle = opendir($dir);
		while ($file = readdir($dir_handle)) {
			if (substr($file, -4) == '.php') {
				require_once WT_MODULES_DIR . $this->getName() . '/plugins/' . $file;
				$label = basename($file, ".php");
				$class = __NAMESPACE__ . '\\' . $label. '_plugin';
				$array[$label] = new $class;
			}
		}
		closedir($dir_handle);
		ksort($array);
		return $array;
	}

	// Based on function print_name_record() in /app/Controller/Individual.php
	private function getPrimaryName(Fact $fact) {
		if (!$fact->canShow()) {
			return false;
		}
		$factrec = $fact->getGedCom();
		// Create a dummy record, so we can extract the formatted NAME value from the event.
		$dummy = new Individual(
			'xref', "0 @xref@ INDI\n1 DEAT Y\n" . $factrec, null, WT_GED_ID
		);
		$all_names = $dummy->getAllNames();
		return $all_names[0];
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
