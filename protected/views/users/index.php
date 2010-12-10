<?php
$this->breadcrumbs=array(
	'Users',
);

/*if(!Yii::app()->user->isGuest) {
	$this->menu=array(
		array('label'=>Yii::t('yiinka', 'Create').' Users', 'url'=>array('create')),
		array('label'=>Yii::t('yiinka', 'Manage').' Users', 'url'=>array('admin')),
	);
}*/
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>
