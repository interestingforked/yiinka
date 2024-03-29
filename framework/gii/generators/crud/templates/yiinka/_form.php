<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
          'validateOnSubmit' => true,
          'validateOnChange' => true,
        ),
)); ?>\n"; ?>

	<p class="note"><?php echo "<?php ";?> echo(Yii::t('yiinka', 'Fields with <span class="required">*</span> are required'));?></p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
?>
	<div class="row">
		<?php echo "<strong><?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?></strong><br/>\n"; ?>
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::hiddenField('referer', Yii::app()->request->getUrlReferrer()); ?>\n"; ?>
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? Yii::t('yiinka', 'Create') : Yii::t('yiinka', 'Save')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->