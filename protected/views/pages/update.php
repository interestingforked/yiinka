<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('yiinka', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' Pages', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Create').' Pages', 'url'=>array('create')),
	array('label'=>Yii::t('yiinka', 'View').' Pages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('yiinka', 'Manage').' Pages', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('yiinka', 'Update'); ?> Pages #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>