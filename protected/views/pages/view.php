<?php
$this->pageTitle=$model->meta_title;

$this->breadcrumbs=array(
	$model->title,
);

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) echo ('<div class="adminDiv">');

echo('<h1>'.$model->title.'</h1>'.$model->content.'<br/><br/>');

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) echo ('</div>');

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) {
	$controllerId = "pages";
	$positionId = $model->id;
		
	$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array($controllerId.'/index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array($controllerId.'/admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
			array('url'=>array($controllerId.'/update', 'id'=>$positionId), 'itemOptions'=>array('class'=>'adminUpdate', 'title'=>Yii::t('yiinka', 'Update'))),
			array('url'=>array($controllerId.'/create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			array('url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$positionId),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?')), 'itemOptions'=>array('class'=>'adminDelete', 'title'=>Yii::t('yiinka', 'Delete'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
}
?>
