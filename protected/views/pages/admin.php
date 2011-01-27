<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	Yii::t('yiinka', 'Manage'),
);
?>

<h1><?php echo(Yii::t('yiinka', 'Manage'));?> Pages</h1>

<?php
$this->widget('PagesAdmin');
?>
