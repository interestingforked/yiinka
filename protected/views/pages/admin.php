<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	Yii::t('yiinka', 'Manage'),
);
?>

<h1><?php echo(Yii::t('yiinka', 'Manage'));?> Pages</h1>

<div class="adminDiv">
<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'content',
		'meta_title',
		'keywords',
		'description',
		array(
            'name'=>'visible',
            'value'=>'(CHtml::encode($data->visible)==0) ? Yii::t("yiinka", "Noactive") : Yii::t("yiinka", "Active")',
        ),

		'url',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
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