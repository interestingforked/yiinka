<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title=>array('view','url'=>$model->url),
	Yii::t('yiinka', 'Update'),
);
?>

<h1><?php echo Yii::t('yiinka', 'Update'); ?> Pages #<?php echo $model->id; ?></h1>

<?php 
echo $this->renderPartial('_form', array('model'=>$model)); 

$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			array('url'=>array('view', 'url'=>$model->url), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'View'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>