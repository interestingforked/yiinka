<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::t('yiinka', 'Create'),
);

/*$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' Users', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('yiinka', 'Create');?> Users</h1>

<?php 
echo $this->renderPartial('_form', array('model'=>$model));
 
$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>