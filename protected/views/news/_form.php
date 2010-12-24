<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
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
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php  echo CHtml::activeDropDownList($model, 'visible', array(Yii::t('yiinka', 'Noactive'), Yii::t('yiinka', 'Active'))); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo CHtml::activeTextArea($model,'text',array('rows'=>6, 'cols'=>57)); ?>
		<?php $this->widget('application.extensions.elrte.elRTE', array( 
			// required object CModel 
			'model'=>$model, 
			// reqired attribute of model 
			'attribute'=>'text', 
			// see available languages on elRTE documentation site 
			'lang'=>'ru', 
			// editor height in pixels 
			'height'=>300, 
			// see available toolbars on elRTE documentation site 
			'toolbar'=>'maxi', 
			// use <span> with style or HTML tags 
			'styleWithCss'=>true, 
			// allow user to edit source 
			'allowSource'=>true,
		)); ?>
		<?php /*$this->widget('application.extensions.ckeditor.ECKEditor', array(
				'model'=>$model,
				'attribute'=>'text',
				'language'=>'ru',
				'editorTemplate'=>'full',
				'options'=>array(
					'filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('files/browse')),
				),
			)); */
		?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::hiddenField('referer', Yii::app()->request->getUrlReferrer()); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('yiinka', 'Create') : Yii::t('yiinka', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->