<?php 
$this->pageTitle=Yii::t('yiinka', 'Instruments');

$this->breadcrumbs=array(
	Yii::t('yiinka', 'Instruments'),
);

echo('<h1>'.$this->pageTitle.'</h1>');

?>
<div class="adminPanelOneInstrument">
<?php echo CHtml::link("<img src='".Yii::app()->request->baseUrl."/images/system/instruments/php.gif' alt='' border='0' class='adminPanelInstrumentImage'/><br/>Phpinfo", array('instruments/phpinfo'), array ("target"=>"_blank"));?>
</div>
<div class="adminPanelClear">&nbsp;</div>
