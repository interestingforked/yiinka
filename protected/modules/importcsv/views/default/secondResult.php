<?php
if($error==1) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'Delimiter can not be empty')."</span>");
}
elseif($error==0){

    /*
     * making options width csv poles for third step
     */

    $lengthCsv = sizeof($fromCsv);
    $optionsContent = '<option value=\"\"></option>';
    for($i=0; $i<$lengthCsv; $i++) {
        $valOpt = $i+1;
        $optionsContent = $optionsContent.'<option value=\"'.$valOpt.'\">'.trim($fromCsv[$i]).'</option>';
    }

    $optionsContent=trim($optionsContent);

    /*
     * making table width poles for third step
     */
    
    $length = sizeof($tableColumns);
    $thirdContent = '<table class=\"importCsvTable\" cellpadding=\"5\" cellspacing=\"1\" border=\"0\" width=\"100%\"><tr><th>'.Yii::t('importcsvModule.importcsv', 'Table pole').'</th><th>'.Yii::t('importcsvModule.importcsv', 'CSV pole').'</th></tr>';
    for($i=0; $i<$length; $i++) {
        $thirdContent = $thirdContent.'<tr><td>'.$tableColumns[$i].'</td><td><select name=\"Poles['.$i.']\">'.$optionsContent.'</select></td></tr>';
    }
    $thirdContent = $thirdContent.'</table>';
    $thirdContent = trim($thirdContent);

   ?>
    <script type="text/javascript">
        toThirdStep("<?php echo($thirdContent);?>", "<?php echo($delimiter);?>", "<?php echo($table);?>");
    </script>
    <?php
}
?>
