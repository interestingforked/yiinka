<?php
if($error==1) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'Unable to upload file')."</span>");
}
elseif ($error==2) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'Download file is not a .csv')."</span>");
}
elseif ($error==0) {
    ?>
    <script type="text/javascript">
        window.parent.toSecondStep();
    </script>
    <?php
}
?>