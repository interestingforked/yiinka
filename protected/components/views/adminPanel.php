<div class="adminPanel">
	<div class="adminPanelLeft"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/system/logo.gif" alt="" border="0"/></div>
	<div class="adminPanelRight">
		<? echo (CHtml::link('<div class="adminPanelGii" title="'.Yii::t('yiinka', 'Gii').'"></div>', array('gii/')));?>
		<? echo (CHtml::link('<div class="adminPanelUsers" title="'.Yii::t('yiinka', 'Users list').'"></div>', array('users/admin')));?>
	</div>
	<div class="adminPanelClear">&nbsp;</div>
</div>