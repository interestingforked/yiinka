<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	Yii::t('yiinka', 'Manage'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo(Yii::t('yiinka', 'Manage'));?> News</h1>

<p>
<?php echo(Yii::t('yiinka', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done'));?>
</p>

<?php echo CHtml::link(Yii::t('yiinka', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="adminDiv">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
</div>
<?php
$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>
