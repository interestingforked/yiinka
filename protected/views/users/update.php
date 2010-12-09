<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('yiinka', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' Users', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Create').' Users', 'url'=>array('create')),
	array('label'=>Yii::t('yiinka', 'View').' Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('yiinka', 'Update'); ?> Users #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>