<?php
if($error==1) {
    echo("<span class='importCsvError'>".Yii::t('importcsvModule.importcsv', 'Error').": ".Yii::t('importcsvModule.importcsv', 'Delimiter can not be empty')."</span>");
}
elseif ($error==0) {
    $length = sizeof($tableColumns);
    $thirdContent = '';
    for($i=0; $i<$length; $i++) {
        $thirdContent = $thirdContent."<div>".$tableColumns[$i]."</div>";
    }
    ?>
    <script type="text/javascript">
        toThirdStep("<?php echo($thirdContent);?>");
    </script>
    <?php
}
?>
