<?php
$this->pageTitle=Yii::t('yiinka', 'Import CSV');

$this->breadcrumbs=array(
    Yii::t('yiinka', 'Instruments')=>array('index'),
    Yii::t('yiinka', 'Import CSV'),
);

echo('<h1>'.$this->pageTitle.'</h1>');

$this->widget('ext.fromcsvtodb.FromCsvToDbWidget', array(
    'path'=>'/upload/importcsv'));
?>
