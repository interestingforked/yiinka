<div class="adminPanel">
	<div class="adminPanelLeft"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/system/logo.gif" alt="" border="0"/></div>
	<div class="adminPanelRight">
		<?php 
			echo (CHtml::link('<div class="adminPanelGii" title="'.Yii::t('yiinka', 'Gii').'"></div>', array('gii/')));
			echo (CHtml::link('<div class="adminPanelUsers" title="'.Yii::t('yiinka', 'Users list').'"></div>', array('users/admin')));
			if(Yii::app()->user->getState('mode')==0) {
			    echo (CHtml::link('<div class="adminPanelEdit" title="'.Yii::t('yiinka', 'Edit mode').'"></div>', array('users/mode', "id"=>1)));
			}
			else {
				echo (CHtml::link('<div class="adminPanelView" title="'.Yii::t('yiinka', 'View mode').'"></div>', array('users/mode', "id"=>0)));
			}
		?>
	</div>
	<div class="adminPanelClear">&nbsp;</div>
</div>