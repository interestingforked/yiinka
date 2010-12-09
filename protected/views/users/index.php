<?php
$this->breadcrumbs=array(
	'Users',
);

if(!Yii::app()->user->isGuest) {
	$this->menu=array(
		array('label'=>Yii::t('yiinka', 'Create').' Users', 'url'=>array('create')),
		array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
	);
}
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
