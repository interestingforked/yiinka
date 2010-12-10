<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

/*if(!Yii::app()->user->isGuest) {
	$this->menu=array(
		array('label'=>Yii::t('yiinka', 'List').' Users', 'url'=>array('index')),
		array('label'=>Yii::t('yiinka', 'Create').' Users', 'url'=>array('create')),
		array('label'=>Yii::t('yiinka', 'Update').' Users', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('yiinka', 'Delete').' Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?'))),
		array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
	);
}*/
?>

<h1><?php echo Yii::t('yiinka', 'View'); ?> Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
	),
)); 

$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			array('url'=>array('update', 'id'=>$model->id), 'itemOptions'=>array('class'=>'adminUpdate', 'title'=>Yii::t('yiinka', 'Update'))),
			array('url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?')), 'itemOptions'=>array('class'=>'adminDelete', 'title'=>Yii::t('yiinka', 'Delete'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>
