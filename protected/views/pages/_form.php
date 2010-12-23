<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo(Yii::t('yiinka', 'Fields with <span class="required">*</span> are required'));?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
		<?php echo $form->error($model,'parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php  echo CHtml::activeDropDownList($model, 'visible', array(Yii::t('yiinka', 'Noactive'), Yii::t('yiinka', 'Active'))); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php  echo $form->labelEx($model,'content'); ?>
		<?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
				'model'=>$model,
				'attribute'=>'content',
				'language'=>'ru',
				'editorTemplate'=>'full',
				'options'=>array(
					'filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('files/browse')),
				),
			)); 
		?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::hiddenField('referer', CHttpRequest::getUrlReferrer()); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('yiinka', 'Create') : Yii::t('yiinka', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->