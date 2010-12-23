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

class FileManagerWidget extends CWidget
{
	public $path;
	public $language;
	public $theme;
	public $cssFile;
	protected $baseUrl;
	
	/*protected function registerClientScript()
    {
		$file = dirname(__FILE__).DIRECTORY_SEPARATOR."css/".$this->theme.'.css';
   		$this->cssFile = Yii::app()->getAssetManager()->publish($file);
        $cs=Yii::app()->clientScript;
        $cs->registerCssFile($this->cssFile);
    }*/

	public function init()
	{
        $this->baseUrl = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR."css");
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($this->baseUrl.'/'.$this->theme.'.css');
				
		/*$file = dirname(__FILE__).DIRECTORY_SEPARATOR."css/".$this->theme.'.css';
   		$this->cssFile = Yii::app()->getAssetManager()->publish($file);*/
	
		$this->render('fileManagerWidget',array(
			"path"     => $this->path,
			"language" => $this->language,
		));
	}
}
?>
