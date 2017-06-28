<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2018 JustCarmen (http://justcarmen.nl)
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
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks;

use Composer\Autoload\ClassLoader;
use Fisharebest\Webtrees\Controller\BaseController;
use Fisharebest\Webtrees\Database;
use Fisharebest\Webtrees\Filter;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Log;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use Fisharebest\Webtrees\Module\ModuleMenuInterface;
use Fisharebest\Webtrees\Module\ModuleSidebarInterface;
use Fisharebest\Webtrees\Theme;
use JustCarmen\WebtreesAddOns\FancyResearchLinks\Template\AdminTemplate;

class FancyResearchLinksModule extends AbstractModule implements ModuleConfigInterface, ModuleSidebarInterface, ModuleMenuInterface {

  const CUSTOM_VERSION = '1.8.0-dev';
  const CUSTOM_WEBSITE = 'http://www.justcarmen.nl/fancy-modules/fancy-research-links/';

  /** @var array primary name */
  var $primary;

  /**
   * @var array extra attributes to use in search queries
   * attribute must be a string
   */
  var $attrs;

  /** @var string location of the module files */
  var $directory;

  public function __construct() {
    parent::__construct('fancy_research_links');

    $this->directory = WT_STATIC_URL . WT_MODULES_DIR . $this->getName();

    // register the namespace
    $loader = new ClassLoader();
    $loader->addPsr4('JustCarmen\\WebtreesAddOns\\FancyResearchLinks\\', WT_MODULES_DIR . $this->getName() . '/app');
    $loader->register();
  }

  /**
   * Get the module class.
   *
   * Class functions are called with $this inside the source directory.
   */
  private function module() {
    return new FancyResearchLinksClass;
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
        if (Filter::post('action') === 'save' && Filter::checkCsrf()) {
          $this->setPreference('FRL_PLUGINS', implode(',', Filter::postArray('NEW_FRL_PLUGINS')));
          $this->setPreference('FRL_DEFAULT_AREA', Filter::post('FRL_DEFAULT_AREA'));
          $this->setPreference('FRL_TARGET_BLANK', Filter::post('FRL_TARGET_BLANK'));
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

    $controller->addInlineJavascript('
			$("#sidebar-header-' . $this->getName() . ' a").text("' . $this->getSidebarTitle() . '");
		', BaseController::JS_PRIORITY_HIGH);

    $controller->addInlineJavascript('

      $(".fancy-research-links").each(function() {
        // expand the default search area
        $(this).find(".frl-area").each(function(){
          if ($(this).data("area") === "' . $this->getPreference('FRL_DEFAULT_AREA') . '") {
            $(this).find(".frl-list").css("display", "block");
          }
        });

        $(this).on("click", ".frl-area-title", function(e){
          e.preventDefault();
          $(this).next(".frl-list").slideToggle()
          $(this).parent().siblings().find(".frl-list").slideUp();
          $("a[rel^=external]").attr("target", "_blank");
        });
       });
				
			// function for use by research links which need a javascript form submit
			// source: see http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit
			// usage: see OnlineBegraafplaatsen plugin and MetaGenealogy plugin
			function postresearchform(url, params) {
				
				var form = document.createElement("form");
				form.setAttribute("method", "post");
				form.setAttribute("action", url);
				form.setAttribute("target", "_blank");
				
				for(var key in params) {
					if(params.hasOwnProperty(key)) {
						var hiddenField = document.createElement("input");
						hiddenField.setAttribute("type", "hidden");
						hiddenField.setAttribute("name", key);
						hiddenField.setAttribute("value", params[key]);
						
						form.appendChild(hiddenField);
					 }
				}
				
				document.body.appendChild(form);
				form.submit();
			}
		');

    try {
      $html = '<div class="fancy-research-links">';
      $html .= '<ul class="fa-ul">';

      $i                     = 0;
      $total_enabled_plugins = 0;

      foreach ($this->module()->getPluginList() as $area => $plugins) {

        $FRL_PLUGINS = $this->module()->getEnabledPlugins($plugins);

        // count enabled plugins in this area
        $count_enabled_plugins = $this->module()->countEnabledPlugins($plugins, $FRL_PLUGINS);

        // count enabled plugins in all areas
        $total_enabled_plugins = $total_enabled_plugins + $count_enabled_plugins;

        if ($count_enabled_plugins > 0) {
          // reset returns the first value in an array
          // we take the area code from the first plugin in this area
          $area_code = reset($plugins)->getSearchArea();
          $html      .= '<li class="frl-area" data-area="' . $area_code . '">' .
              '<i class="fa-li fa fa-caret-right"></i>' .
              '<a href="#" class="frl-area-title h5">' . $area . ' (' . $count_enabled_plugins . ')' . '</a>' .
              '<ul class="frl-list fa-ul">';
          $i++;
          foreach ($plugins as $label => $plugin) {
            if (in_array($label, $FRL_PLUGINS)) {
              foreach ($controller->record->getFacts() as $fact) {
                $tag = $fact->getTag();
                if ($tag == "NAME") {
                  $this->primary = $this->module()->getPrimaryName($fact);
                  break; // only use the first fact with a NAME tag found.
                }
              }

              if ($this->primary) {
                  $this->attrs = [
                      'birthyear'  => $controller->record->getBirthYear(),
                      'birthplace' => $controller->record->getBirthPlace(),
                      'deathyear'  => $controller->record->getDeathYear(),
                      'deathplace' => $controller->record->getDeathPlace()
                  ];
                  $link        = $plugin->createLink($this->module()->getNames($this->primary, $this->attrs, $plugin->encodePlus()));
                if ($this->getSetting('FRL_TARGET_BLANK') === '1') {
                  $target = 'target="_blank"';
                } else {
                  $target = '';
                }
                $html .= '<li><i class="fa-li fa fa-external-link"></i>' .
                    '<a href="' . Filter::escapeHtml($link) . '" ' . $target . ' rel="external nofollow">' .
                    $plugin->getPluginName() .
                    '</a>' .
                    '</li>';
              }
            }
          }
          $html .= '</ul>';
        }
      }
      $html .= '</ul>';

      if ($total_enabled_plugins === 0) {
        $html = I18N::translate('There are no research links available for this individual.');
      }
      $html .= '</div>';

      return $html;
    } catch (ErrorException $ex) {
      Log::addErrorLog('Fancy ResearchLinks: ' . $ex->getMessage());
      return I18N::translate('There are no research links available for this individual.');
    }
  }

  // Implement ModuleMenuInterface
  public function defaultMenuOrder() {
    return 999;
  }

  // Implement ModuleMenuInterface
  public function getMenu() {
    // We don't actually have a menu - this is just a convenient "hook" to execute code at the right time during page execution
    // We need it to load the stylesheet at the right time. If we use this method in the sidebar funcion the stylesheet loads before
    // the other stylesheets. This might give problems.

    if (WT_SCRIPT_NAME === 'individual.php') {
      echo $this->includeCss();
    }
    return null;
  }

  /**
   * Default Fancy script to load a module stylesheet
   *
   * The code to place the stylesheet in the header renders quicker than the default webtrees solution
   * because we do not have to wait until the page is fully loaded
   *
   * @return javascript
   */
  protected function includeCss() {
    return
        '<script>
				var newSheet=document.createElement("link");
				newSheet.setAttribute("rel","stylesheet");
				newSheet.setAttribute("type","text/css");
				newSheet.setAttribute("href","' . $this->directory . '/css/style.css");				
				document.getElementsByTagName("head")[0].appendChild(newSheet);
			</script>';
  }

}

return new FancyResearchLinksModule;
