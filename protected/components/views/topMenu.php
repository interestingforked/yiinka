<?php
$n=1;
if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1 && Yii::app()->user->getState('mode')==1) echo ('<div class="adminDiv">');

foreach($this->getTopMenu() as $page) {
	$active = (isset($_GET['id']) && CHtml::encode($_GET['id'])==$page->id && Yii::app()->controller->id=="pages") ? "_active" : "";
	if($n==1) {
		echo CHtml::link($page->title, array('pages/view', 'url'=>$page->url), array ("class"=>"top_menu2".$active)); 
	}
	else {
		echo CHtml::link($page->title, array('pages/view', 'url'=>$page->url), array ("class"=>"top_menu".$active)); 
	}
 
	$n++;
}

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1 && Yii::app()->user->getState('mode')==1) echo ('</div>');

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1 && Yii::app()->user->getState('mode')==1) {
	$controllerId = "pages";
	$positionId = $model->id;
		
	$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array($controllerId.'/admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
			array('url'=>array($controllerId.'/create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
}
?>
