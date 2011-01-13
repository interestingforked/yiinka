<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('yiinka', 'Login');
$this->breadcrumbs=array(
	Yii::t('yiinka', 'Login'),
);
?>

<h1><?php echo Yii::t('yiinka', 'Login');?></h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
		<?php echo $form->error($model,'visible'); ?>
	</div>
	
	<div class="row">
		<strong><?php echo $model->getAttributeLabel("username"); ?></strong><br/>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<strong><?php echo $model->getAttributeLabel("password"); ?></strong><br/>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?> <?php echo Yii::t('yiinka', 'Remember me next time'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('yiinka', 'Login')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
