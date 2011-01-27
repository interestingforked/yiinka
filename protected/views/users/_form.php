<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
          'validateOnSubmit' => true,
          'validateOnChange' => true,
        ),
)); ?>

	<p class="note"><?php echo(Yii::t('yiinka', 'Fields with <span class="required">*</span> are required'));?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<strong><?php echo $form->labelEx($model,'name'); ?></strong><br/>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<strong><?php echo $form->labelEx($model,'password'); ?></strong><br/>
		<?php
			if(Yii::app()->controller->action->id == "update" && !isset($_POST['Users']))
				echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'value'=>'')); 
			else
				echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128));
		?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<strong><?php echo $form->labelEx($model,'email'); ?></strong><br/>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row">
		<strong><?php echo $form->labelEx($model,'visible'); ?></strong><br/>
		<?php  echo CHtml::activeDropDownList($model, 'visible', array(Yii::t('yiinka', 'Noactive'), Yii::t('yiinka', 'Active'))); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>
	
	<div class="row">
		<strong><?php echo $form->labelEx($model,'role'); ?></strong><br/>
		<?php  echo CHtml::activeDropDownList($model, 'role', array(Yii::t('yiinka', 'User'), Yii::t('yiinka', 'Administrator'))); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::hiddenField('referer', Yii::app()->request->getUrlReferrer()); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('yiinka', 'Create') : Yii::t('yiinka', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->