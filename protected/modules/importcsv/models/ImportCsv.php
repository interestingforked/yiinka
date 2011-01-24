<?php

class ImportCsv extends CFormModel
{
    /*
     *  Insert
     */

    public function InsertAll($table, $linesArray, $poles, $tableColumns)
    {
            $polesLength   = sizeof($poles);
            $tableString = '';
            $csvString   = '';
            $n = 0;
            $linesLength = sizeof($linesArray);

            // watching all strings in array
            
            for($k=0; $k<$linesLength; $k++) {

                // watching all poles in POST
                $n_in = 0;
                
                for($i=0; $i<$polesLength; $i++) {
                    if($poles[$i]!='') {
                        if($k == 0) $tableString = ($n!=0) ? $tableString.", ".$tableColumns[$i] : $tableColumns[$i];

                        if($k == 0 && $n == 0) $csvString = "(";
                        if($k != 0 && $n_in == 0) $csvString = $csvString."), (";

                        $csvString   = ($n_in!=0) ? $csvString.", '".CHtml::encode(stripslashes($linesArray[$k][$poles[$i]-1]))."'" : $csvString."'".CHtml::encode(stripslashes($linesArray[$k][$poles[$i]-1]))."'";
                        
                        $n++;
                        $n_in++;
                    }
                }

            }

            $csvString = $csvString.")";
           /* echo($tableString."=>".$csvString."<br/><pre>");
            print_r($linesArray);
            echo("</pre>");*/
            $sql="INSERT INTO ".$table."(".$tableString.") VALUES ".$csvString."";
            
            $command=Yii::app()->db->createCommand($sql);

            if($command->execute()) 
                 return (1);
            else
                 return (0);
    }

    /*
     *  Update
     */

    public function updateOld($table, $csvLine, $poles, $tableColumns, $needle, $tableKey)
    {
        $polesLength = sizeof($poles);
        $tableString = '';
        $n           = 0;
        
        for($i=0; $i<$polesLength; $i++) {
            if($poles[$i]!='') {
                $tableString = ($n!=0) ? $tableString.", ".$tableColumns[$i]."='".CHtml::encode(stripslashes($csvLine[$poles[$i]-1]))."'" : $tableColumns[$i]."='".CHtml::encode(stripslashes($csvLine[$poles[$i]-1]))."'";

                $n++;
            }
        }
                
        $sql="UPDATE ".$table." SET ".$tableString." WHERE ".$tableKey."='".$needle."'";
        $command=Yii::app()->db->createCommand($sql);

        if($command->execute())
             return (1);
        else
             return (0);
    }

    /*
     * get poles from selected table
     */

    public function tableColumns($table)
    {
        return Yii::app()->getDb()->getSchema()->getTable($table)->getColumnNames();
    }

    /*
     * get all rows from selected table
     */

    public function selectRows($table, $attribute)
    {
        $sql = "SELECT ".$attribute." FROM ".$table;
        $command=Yii::app()->db->createCommand($sql);
        return ($command->queryAll());
    }
}

?>
