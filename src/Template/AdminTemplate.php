<?php
/*
 * webtrees: online genealogy
 * Copyright (C) 2016 webtrees development team
 * Copyright (C) 2016 JustCarmen
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
						jQuery(".checkbox-inline").find(":checkbox").prop("checked", true).val(1);
						jQuery("input[id^=NEW_FRL_PLUGINS]").val(1);
					} else {
						jQuery(".checkbox-inline").find(":checkbox").prop("checked", false).val(0);
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
			<li><a href="admin.php"><?php echo I18N::translate('Control panel') ?></a></li>
			<li><a href="admin_modules.php"><?php echo I18N::translate('Module administration') ?></a></li>
			<li class="active"><?php echo $controller->getPageTitle() ?></li>
		</ol>
		<h2><?php echo $controller->getPageTitle() ?></h2>
		<p class="small text-muted"><?php echo I18N::translate('Check the plugins you want to use in the sidebar.') ?></p>
		<form class="form-horizontal" method="post" name="configform" action="<?php echo $this->getConfigLink() ?>">
			<input type="hidden" name="save" value="1">
			<!-- SELECT ALL -->
			<div class="form-group checkbox col-sm-12">
				<label>
					<?php echo FunctionsEdit::checkbox('select-all') . I18N::translate('select all') ?>
				</label>
			</div>
			<!-- RESEARCH LINKS -->
			<?php foreach ($this->getPluginList() as $area => $plugins): ?>				
				<div class="form-group col-sm-12">
					<h4><?php echo $area ?></h4>
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
								<?php echo FunctionsEdit::twoStateCheckbox('NEW_FRL_PLUGINS[' . $label . ']', $enabled) . ' ' . $plugin->getPluginName() ?>
							</label>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
			<div class="form-group col-sm-12">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-check"></i>
					<?php echo I18N::translate('save') ?>
				</button>
				<button type="reset" class="btn btn-primary" onclick="if (confirm('<?php echo I18N::translate('The settings will be reset to default. Are you sure you want to do this?') ?>'))
							window.location.href = 'module.php?mod=<?php echo $this->getName() ?>&amp;mod_action=admin_reset';">
					<i class="fa fa-recycle"></i>
					<?php echo I18N::translate('reset') ?>
				</button>
			</div>
		</form>
		<?php
	}

}
