<?php
if($error==1) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'No one field is selected')."</span>");
}
elseif($error==0) {
    //echo($delimiter.'=>'.$table."=>".$uploadfile);
}

?>
