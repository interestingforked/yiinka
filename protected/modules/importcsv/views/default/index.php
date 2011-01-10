<?php
$this->breadcrumbs=array(
	Yii::t('importcsvModule.importcsv', 'Import')." CSV",
);
?>
<h1><?php echo Yii::t('importcsvModule.importcsv', 'Import'); ?> CSV</h1>

<?php echo CHtml::beginForm(); ?>

<div id="importCsvFirstStep"> 

    <?php //echo Yii::app()->controller->module->delimiter; ?>
    <?php //echo Yii::app()->controller->module->path; ?>

    <strong>CSV <?php echo Yii::t('importcsvModule.importcsv', 'File'); ?></strong><br/>
    <?php echo CHtml::fileField("csvfile"); ?><br/><br/>

    <?php echo CHtml::submitButton(Yii::t('importcsvModule.importcsv', 'Next')); ?>
</div>
<div id="importCsvSecondStep">

    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Delimiter'); ?></strong><br/>
    <?php echo CHtml::textField("delimiter"); ?><br/><br/>

    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Table'); ?></strong><br/>
    <?php echo CHtml::dropDownList('table', '', $this->tablesArray);?><br/><br/>

    <?php echo CHtml::submitButton(Yii::t('importcsvModule.importcsv', 'Import')); ?>
</div>

<?php echo CHtml::endForm(); ?>