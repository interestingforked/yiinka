<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('yiinka', 'Update'),
);

/*$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' News', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Create').' News', 'url'=>array('create')),
	array('label'=>Yii::t('yiinka', 'View').' News', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('yiinka', 'Manage').' News', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('yiinka', 'Update'); ?> News #<?php echo $model->id; ?></h1>

<?php 
echo $this->renderPartial('_form', array('model'=>$model)); 
$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			array('url'=>array('view', 'id'=>$model->id), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'View'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>