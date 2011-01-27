<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	Yii::t('yiinka', 'Create'),
);\n";
?>

?>

<h1><?php echo "<?php ";?>echo Yii::t('yiinka', 'Create');?> <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
<?php echo "<?php ";?> 
$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('index'), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'List'))),
			array('url'=>array('admin'), 'itemOptions'=>array('class'=>'adminManage', 'title'=>Yii::t('yiinka', 'Manage'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));
?>
