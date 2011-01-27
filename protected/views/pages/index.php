<?php
$this->breadcrumbs=array(
	'Pages',
);

if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1 && Yii::app()->user->getState('mode')==1) {
	$this->menu=array(
		array('label'=>'Create Pages', 'url'=>array('create')),
		array('label'=>'Manage Pages', 'url'=>array('admin')),
	);
}
?>

<h1>Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
