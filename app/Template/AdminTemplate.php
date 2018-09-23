<?php
/*
 * webtrees: online genealogy
 * Copyright (C) 2018 JustCarmen (http://justcarmen.nl)
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace JustCarmen\WebtreesAddOns\FancyResearchLinks\Template;

use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\Controller\PageController;
use Fisharebest\Webtrees\Functions\FunctionsEdit;
use Fisharebest\Webtrees\I18N;
use JustCarmen\WebtreesAddOns\FancyResearchLinks\FancyResearchLinksClass;

class AdminTemplate extends FancyResearchLinksClass {

	protected function pageContent() {
		$controller = new PageController;
		return
			$this->pageHeader($controller) .
			$this->pageBody($controller);
	}

	private function pageHeader(PageController $controller) {
		$controller
			->restrictAccess(Auth::isAdmin())
			->setPageTitle(I18N::translate('Fancy Research Links'))
			->pageHeader()
			->addInlineJavascript('
				jQuery("head").append("<style>[dir=rtl] .checkbox-inline input[type=checkbox]{margin-left:-20px}</style>");
				jQuery("input[name=select-all]").click(function(){
					if (jQuery(this).is(":checked") == true) {
						jQuery(".checkbox-inline").find(":checkbox[name^=NEW_FRL_PLUGINS]").prop("checked", true).val(1);
						jQuery("input[id^=NEW_FRL_PLUGINS]").val(1);
					} else {
						jQuery(".checkbox-inline").find(":checkbox[name^=NEW_FRL_PLUGINS]").prop("checked", false).val(0);
						jQuery("input[id^=NEW_FRL_PLUGINS]").val(0);
					}
					formChanged = true;
				});
			');
	}

	private function pageBody(PageController $controller) {
		$FRL_PLUGINS = unserialize($this->getSetting('FRL_PLUGINS'));
		?>
		<ol class="breadcrumb small">
			<li><a href="admin.php"><?= I18N::translate('Control panel') ?></a></li>
			<li><a href="admin_modules.php"><?= I18N::translate('Module administration') ?></a></li>
			<li class="active"><?= $controller->getPageTitle() ?></li>
		</ol>
		<h2><?= $controller->getPageTitle() ?></h2>
		<div class="alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="' . I18N::translate('close') . '">
				<span aria-hidden="true">&times;</span>
			</button>
			<p class="small"><?= I18N::translate('Check the plugins you want to use in the sidebar.') ?></p>
			<p class="small"><?= I18N::translate('Hit the radio button in front of an research area title to set that research area as default. The chosen research area will open unfolded in the sidebar.') ?></p>
		</div>
		<form class="form-horizontal" method="post" name="configform" action="<?= $this->getConfigLink() ?>">
			<input type="hidden" name="save" value="1">
			<!-- SELECT ALL -->
			<div class="form-group checkbox col-sm-6">
				<label>
					<?= FunctionsEdit::checkbox('select-all') . I18N::translate('select all') ?>
				</label>
			</div>
			<!-- OPEN LINKS IN NEW TAB -->
			<div class="form-group col-sm-6 text-right pull-right">
				<label class="checkbox-inline">
					<?php
						if ($this->getSetting('FRL_TARGET_BLANK') === '1') {
							$blank_enabled = '1';
						} else {
							$blank_enabled = '0';
						}
					?>
					<?= FunctionsEdit::twoStateCheckbox('FRL_TARGET_BLANK', $blank_enabled) ?> <?= I18N::translate('Open links in a new tab') ?>
				</label>
			  <p class="small text-muted"><i class="fa fa-exclamation-triangle"></i> <?= I18N::translate('Enabling this will change the default behavior of the browser.') ?></p>
			</div>
			<!-- RESEARCH LINKS -->
			<?php foreach ($this->getPluginList() as $area => $plugins): ?>				
				<div class="form-group col-sm-12">
					<div class="radio">
						<label class="radio">
							<?php
							// reset returns the first value in an array
							// we take the area code from the first plugin in this area
							$area_code = reset($plugins)->getSearchArea();
							?>
							<input 
								type="radio" 
								name="FRL_DEFAULT_AREA" 
								value="<?= $area_code ?>"
								<?php if ($this->getSetting('FRL_DEFAULT_AREA') === $area_code): ?>
									checked="checked"
								<?php endif; ?>
								>
							<span class="h4"><?= $area ?></span>
						</label>
					</div>
					<?php foreach ($plugins as $label => $plugin): ?>
						<?php
						if (is_array($FRL_PLUGINS) && array_key_exists($label, $FRL_PLUGINS)) {
							$enabled = $FRL_PLUGINS[$label];
						} else {
							$enabled = '1';
						}
						?>
						<div class="checkbox col-sm-4" dir="ltr">
							<label class="checkbox-inline">
								<?= FunctionsEdit::twoStateCheckbox('NEW_FRL_PLUGINS[' . $label . ']', $enabled) . ' ' . $plugin->getPluginName() ?>
							</label>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
			<div class="form-group col-sm-12">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-check"></i>
					<?= I18N::translate('save') ?>
				</button>
				<button type="reset" class="btn btn-primary" onclick="if (confirm('<?= I18N::translate('The settings will be reset to default. Are you sure you want to do this?') ?>'))
							window.location.href = 'module.php?mod=<?= $this->getName() ?>&amp;mod_action=admin_reset';">
					<i class="fa fa-recycle"></i>
					<?= I18N::translate('reset') ?>
				</button>
			</div>
		</form>
		<?php
	}

}
