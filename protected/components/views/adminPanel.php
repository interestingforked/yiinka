<div class="adminPanel">
	<div class="adminPanelLeft"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/system/logo.gif" alt="" border="0"/></div>
	<div class="adminPanelRight">
		<div class="adminPanelModelsList">
			<form>
				<select class="adminPanelSelect" id="adminPanelModelsList">
					<option><?php echo (Yii::t('yiinka', 'Select Model'));?></option>
					<?php
					$path = "protected/controllers/";
					$dir = opendir ($path);
					while ($file = readdir ($dir))  {
						if (( $file != ".") && ($file != "..")) {
							require_once($path.$file);
							$myfile = Yii::app()->file->set($path.$file, true);
							$modelName = explode("Controller", $myfile->filename);
							if(method_exists($myfile->filename, 'actionAdmin'))
								echo "<option value='".Yii::app()->createUrl(strtolower($modelName[0]).'/admin')."'>".$modelName[0]."</option>\n";
						}
					}
					closedir ($dir);
					?>
				</select>
			</form>
		</div>
		<?php 
			echo (CHtml::link('<div class="adminPanelGii" title="'.Yii::t('yiinka', 'Gii').'"></div>', array('gii/')));
			if(Yii::app()->user->getState('mode')==0) {
			    echo (CHtml::link('<div class="adminPanelEdit" title="'.Yii::t('yiinka', 'Edit mode').'"></div>', array('users/mode', "id"=>1)));
			}
			else {
				echo (CHtml::link('<div class="adminPanelView" title="'.Yii::t('yiinka', 'View mode').'"></div>', array('users/mode', "id"=>0)));
			}
		?>
	</div>
	<div class="adminPanelCenter">
		<?php
			echo (CHtml::link('<div class="adminPanelUsers" title="'.Yii::t('yiinka', 'Users list').'"></div>', array('users/view', 'id'=>Yii::app()->user->id)));
		?>
		<div class="adminPanelUsersName">
			<?php
				echo (CHtml::link(Yii::app()->user->name, array('users/view', 'id'=>Yii::app()->user->id)));
				echo (CHtml::link(Yii::t('yiinka', 'Exit'), array('/site/logout'), array("class"=>"adminPanelExit")));
			?>
		</div>
	</div>
	<div class="adminPanelClear">&nbsp;</div>
</div>