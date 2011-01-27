<?php
	$cs=Yii::app()->clientScript;
	/* register css */
	$cs->registerCSSFile(Yii::app()->request->baseUrl.'/js/jquery_ui/css/custom-theme/jquery-ui-1.8.7.custom.css', '');
	/* Register js */
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery_ui/jquery.ui.core.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery_ui/jquery.ui.datepicker.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery_ui/jquery.ui.datepicker-ru.js', CClientScript::POS_HEAD);
	/* Register script for datepicker */
	$script = '$(function() {'."\n";
	$script .= '$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional[\'\']));'."\n";
	/* Не забываем менять ID поля ;) */
	$script .= '$("#News_date").datepicker($.datepicker.regional[\'ru\']);'."\n";
	$script .= '});'."\n";
	$cs->registerScript('datepicker_init_local', $script, CClientScript::POS_BEGIN);
?>

<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
          'validateOnSubmit' => true,
          'validateOnChange' => true,
        ),
        'htmlOptions'=>array(
            'enctype'=>'multipart/form-data'
        ),
)); 
?>

	<p class="note"><?php echo(Yii::t('yiinka', 'Fields with <span class="required">*</span> are required'));?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<strong><?php echo $form->labelEx($model,'title'); ?></strong><br/>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<strong><?php echo $form->labelEx($model,'date'); ?></strong><br/>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
        <div class="row">
		<strong><?php echo $form->labelEx($model,'photo'); ?></strong>
                <br/>
                <div class="photoLeft">
                    <?php
                        if($model->photo=='') {
                            echo (Yii::t('yiinka', 'Upload file'));
                        }
                        else {
                            echo(CHtml::link(CHtml::image("/upload/news/".$model->photo, $model->title, array("class"=>"photoImage")), "/upload/news/".$model->photo, array("target"=>"_blank")));
                            echo("<br/>");
                            echo Chtml::checkBox('delete_photo')." ".Yii::t('yiinka', 'Delete file');
                        }
                    ?>
                </div>
                <div class="photoRight">
                    <?php echo $form->fileField($model, 'photo'); ?>
                </div>
                <div class="photoClear">&nbsp;</div>
		<?php echo $form->error($model,'photo'); ?>
	</div>
	
	<div class="row">
		<strong><?php echo $form->labelEx($model,'visible'); ?></strong><br/>
		<?php  echo CHtml::activeDropDownList($model, 'visible', array(Yii::t('yiinka', 'Noactive'), Yii::t('yiinka', 'Active'))); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row">
		<strong><?php echo $form->labelEx($model,'text'); ?></strong><br/>
		<?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
				'model'=>$model,
				'attribute'=>'text',
				'language'=>'ru',
				'editorTemplate'=>'full',
				'options'=>array(
					'filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('files/browse')),
				),
			));
		?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::hiddenField('referer', Yii::app()->request->getUrlReferrer()); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('yiinka', 'Create') : Yii::t('yiinka', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->