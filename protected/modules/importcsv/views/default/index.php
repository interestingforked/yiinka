<?php
$this->breadcrumbs=array(
	Yii::t('importcsvModule.importcsv', 'Import')." CSV",
);
?>
<h1><?php echo Yii::t('importcsvModule.importcsv', 'Import'); ?> CSV</h1>

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::hiddenField("fileName", ""); ?>

<div id="importCsvFirstStep">
    <?php  echo CHtml::button(Yii::t('importcsvModule.importcsv', 'Select CSV File'), array("id"=>"importStep1")); ?>
</div>
<div id="importCsvFirstStepResult">
    &nbsp;
</div>
<div id="importCsvSecondStep">
    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Delimiter'); ?></strong><br/>
    <?php echo CHtml::textField("delimiter", $delimiter); ?>
    <br/><br/>

    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Table'); ?></strong><br/>
    <?php echo CHtml::dropDownList('table', '', $tablesArray);?><br/><br/>
    
    <?php
    echo CHtml::ajaxSubmitButton(Yii::t('importcsvModule.importcsv', 'Next'), '', array(
        'type' => 'POST',
        // Результат запроса записываем в элемент, найденный
        // по CSS-селектору #output.
        'update' => '#importCsvSecondStepResult',
    ));
    ?>
</div>
<div id="importCsvSecondStepResult">
    &nbsp;
</div>
<div id="importCsvThirdStep">
    &nbsp;
</div>
<div id="importCsvThirdStepResult">
    &nbsp;
</div>

<?php echo CHtml::endForm(); ?>