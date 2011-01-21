<?php
if($error==1) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'No one field is selected')."</span>");
}
elseif($error==2) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": '".Yii::t('importcsvModule.importcsv', 'Items per one request')."' - ".Yii::t('importcsvModule.importcsv', 'must not be empty')."</span>");
}
elseif($error==3) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": '".Yii::t('importcsvModule.importcsv', 'Items per one request')."' - ".Yii::t('importcsvModule.importcsv', 'must be a number')."</span>");
}
elseif($error==4) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'For this mode')." '".Yii::t('importcsvModule.importcsv', 'Keys for compare')."' - ".Yii::t('importcsvModule.importcsv', 'must be selected')."</span>");
}
elseif($error==0) {
    if(empty($error_array)) {
        $strings = Yii::t('importcsvModule.importcsv', 'No');
    }
    else {
        $errorsLength = sizeof($error_array);
        for($k=0; $k<$errorsLength; $k++) {
           $strings = ($k == 0) ? $errorsLength[$k] : ", ".$errorsLength[$k];
        }
    }
    
    echo "<span class='importCsvNoError'>".Yii::t('importcsvModule.importcsv', 'Import was carried out')."</span>.<br/>".Yii::t('importcsvModule.importcsv', 'Errors in rows').": ".$strings;

    /*?>
    <script type="text/javascript">
        toEnd();
    </script>
    <?php*/
}

?>
