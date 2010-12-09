<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

if(!Yii::app()->user->isGuest) {
	$this->menu=array(
		array('label'=>Yii::t('yiinka', 'List').' Users', 'url'=>array('index')),
		array('label'=>Yii::t('yiinka', 'Create').' Users', 'url'=>array('create')),
		array('label'=>Yii::t('yiinka', 'Update').' Users', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('yiinka', 'Delete').' Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?'))),
		array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
	);
}
?>

<h1><?php echo Yii::t('yiinka', 'View'); ?> Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
	),
)); ?>
