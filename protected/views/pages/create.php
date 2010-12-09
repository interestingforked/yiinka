<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	Yii::t('yiinka', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('yiinka', 'List').' Pages', 'url'=>array('index')),
	array('label'=>Yii::t('yiinka', 'Manage').' Pages', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('yiinka', 'Create');?> Pages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>