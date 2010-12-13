<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>
?>

<h1><?php echo "<?php"; ?> echo Yii::t('yiinka', 'View'); ?> <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); 

$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
			array('url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'itemOptions'=>array('class'=>'adminUpdate', 'title'=>Yii::t('yiinka', 'Update'))),
			array('url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?')), 'itemOptions'=>array('class'=>'adminDelete', 'title'=>Yii::t('yiinka', 'Delete'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>
