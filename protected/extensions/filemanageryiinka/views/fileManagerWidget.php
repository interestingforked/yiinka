<?php
/*
 * Created on 21.12.2010
 *
 * Copyright: Artem Demchenkov (lunoxot@mail.ru)
 *
 * GNU LESSER GENERAL PUBLIC LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * This extension have to be installed into:
 * <Yii-Application>/protected/extensions/filemanageryiinka
 *
 * Usage:
 * <?php $this->widget('application.extensions.filemanageryiinka.FileManagerYiinka',array(
 * 			"path"			=>	Yii::app()->baseUrl.'/userFiles'
 * ) ); ?>
 */
?>
<div class="FileManagerWidgetNav">Navigation String</div>
<div class="FileManagerWidgetWorkArea">
	<div class="FileManagerWidgetWorkAreaLeft">
	&nbsp;
	</div>
	<div class="FileManagerWidgetWorkAreaRight">
	&nbsp;
	</div>
	<div class="FileManagerWidgetWorkAreaCenter">
		<?php
		$dir = opendir ($path);
		while ($file = readdir ($dir))  {
			if (( $file != ".") && ($file != "..")) {
				echo ("<div class='FileManagerWidgetOne'>".$file."</div>");
			}
		}
		closedir ($dir);
		?>
	</div>
</div>
<div class="FileManagerWidgetOption">Option String</div>
