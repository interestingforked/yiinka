<?php
$this->breadcrumbs=array(
	'Users',
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

if(Yii::app()->user->getState('mode')==1) {
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
				array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			),
			'htmlOptions'=>array('class'=>'adminUl'),
			'linkLabelWrapper'=>'div',
		));
}
?>
