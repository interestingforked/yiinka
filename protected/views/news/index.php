<?php
$this->pageTitle="Новости";

$this->breadcrumbs=array(
	'Новости',
);


if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) echo ('<div class="adminDiv">');

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) {
	echo ('</div>');
	$controllerId = "news";
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
