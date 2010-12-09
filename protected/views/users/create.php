<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::t('yiinka', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' Users', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('yiinka', 'Create');?> Users</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>