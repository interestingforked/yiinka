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
     * making options width csv poles for third step
     */

    $length = sizeof($tableColumns);
    $optionsContent2 = '<option value=\"\"></option>';
    $optionsContent3 = '<option value=\"\"></option>';
    for($i=0; $i<$length ; $i++) {
        $valOpt2 = $i+1;
        $optionsContent2 = $optionsContent2.'<option value=\"'.$valOpt2.'\">'.trim($tableColumns[$i]).'</option>';
        $optionsContent3 = $optionsContent3.'<option value=\"'.trim($tableColumns[$i]).'\">'.trim($tableColumns[$i]).'</option>';
    }

    $optionsContent2 = trim($optionsContent2);
    $optionsContent3 = trim($optionsContent3);

    /*
     * making table width poles for third step
     */
    
    $modeContent = '<select name=\"Mode\"><option value=\"1\">'.Yii::t('importcsvModule.importcsv', 'Insert all').'</option><option value=\"2\">'.Yii::t('importcsvModule.importcsv', 'Insert new').'</option><option value=\"3\">'.Yii::t('importcsvModule.importcsv', 'Insert new and replace old').'</option></select>';
    $keysContent = '<tr><td>'.Yii::t('importcsvModule.importcsv', 'Table pole').'</td><td><select name=\"Tablekey\">'.$optionsContent3.'</select></td></tr><tr><td>'.Yii::t('importcsvModule.importcsv', 'CSV pole').'</td><td><select name=\"CSVkey\">'.$optionsContent.'</select></td></tr>';
    
    $thirdContent = '<table class=\"importCsvTable\" cellpadding=\"5\" cellspacing=\"1\" border=\"0\" width=\"100%\"><tr><td width=\"50%\">'.Yii::t('importcsvModule.importcsv', 'Mode').' <span class=\"require\">*</span></td><td width=\"50%\">'.$modeContent.'</td></tr><tr><td width=\"50%\">'.Yii::t('importcsvModule.importcsv', 'Items per one request').' <span class=\"require\">*</span></td><td width=\"50%\"><input type=\"text\" name=\"perRequest\" value=\"10\"/></td></tr><tr><th colspan=\"2\">'.Yii::t('importcsvModule.importcsv', 'Keys for compare').'</th>'.$keysContent.'</tr><tr><th>'.Yii::t('importcsvModule.importcsv', 'Table pole').'</th><th>'.Yii::t('importcsvModule.importcsv', 'CSV pole').'</th></tr>';
    for($i=0; $i<$length; $i++) {
        $thirdContent = $thirdContent.'<tr><td>'.$tableColumns[$i].'</td><td><select name=\"Poles['.$i.']\">'.$optionsContent.'</select></td></tr>';
    }
    $notes1 = '<strong><em>'.Yii::t('importcsvModule.importcsv', 'Notes').'</em></strong><br/>&laquo;'.Yii::t('importcsvModule.importcsv', 'Insert all').'&raquo; - '.Yii::t('importcsvModule.importcsv', 'All items add. Old items remain unchanged');
    $notes2 = '&laquo;'.Yii::t('importcsvModule.importcsv', 'Insert new').'&raquo; - '.Yii::t('importcsvModule.importcsv', 'New items add. Old items remain unchanged');
    $notes3 = '&laquo;'.Yii::t('importcsvModule.importcsv', 'Insert new and replace old').'&raquo; - '.Yii::t('importcsvModule.importcsv', 'New items add. Old items replace');
    $thirdContent = $thirdContent.'</table><br/><br/>'.$notes1.'<br/>'.$notes2.'<br/>'.$notes3;
    $thirdContent = trim($thirdContent);

   ?>
    <script type="text/javascript">
        toThirdStep("<?php echo($thirdContent);?>", "<?php echo($delimiter);?>", "<?php echo($table);?>");
    </script>
    <?php
}
?>
