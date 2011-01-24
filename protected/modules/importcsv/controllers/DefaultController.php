<?php

class DefaultController extends Controller
{
        public $colsArray = array();
        
        /*
         * action for form
         */
    
	public function actionIndex()
	{
           /*
            * publish css and js
            */

           Yii::app()->clientScript->registerCssFile(
                Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('application.modules.importcsv.assets').'/styles.css'
                )
            );

            Yii::app()->clientScript->registerScriptFile(
                Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('application.modules.importcsv.assets').'/ajaxupload.js'
                )
            );

            Yii::app()->clientScript->registerScriptFile(
                Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('application.modules.importcsv.assets').'/download.js'
                )
            );

           /*
            * getting all tables from db
            */

           $tables = Yii::app()->getDb()->getSchema()->getTableNames();

           $tablesLength = sizeof($tables);
           $tablesArray = array();
           for($i=0; $i<$tablesLength; $i++) {
                $tablesArray[$tables[$i]] = $tables[$i];
           }
                
           if(Yii::app()->request->isAjaxRequest){
               if($_POST['thirdStep']!=1) {
                    /*
                     * second step
                     */

                    $delimiter = CHtml::encode(trim($_POST['delimiter']));
                    $table = CHtml::encode($_POST['table']);

                    if($_POST['delimiter']=='') {
                        $error=1;
                    }
                    else {
                        /*
                         * get all columns from csv file
                         */

                        $error=0;
                        $uploaddir    = Yii::app()->controller->module->path;
                        $uploadfile   = $uploaddir.basename($_POST['fileName']);
                        $filecontent  = explode("\n", file_get_contents($uploadfile));
                        $csvFirstLine = explode($delimiter, $filecontent[0]);

                        /*
                         * get all columns from selected table
                         */
                        
                         $model=new ImportCsv;
                         $tableColumns = $model->tableColumns($table);
                    }

                    $this->layout='clear';
                    $this->render('secondResult', array(
                        'error'=>$error,
                        'tableColumns'=>$tableColumns,
                        'delimiter'=>$delimiter,
                        'table'=>$table,
                        'fromCsv'=>$csvFirstLine,
                    ));
               }
               else {
                    /*
                     * third step
                     */

                   if(array_sum($_POST['Poles'])>0) {
                      if($_POST['perRequest']!='') {
                          if(is_numeric($_POST['perRequest'])) {
                              $tableKey = CHtml::encode($_POST['Tablekey']);
                              $csvKey   = CHtml::encode($_POST['CSVkey']);
                              $mode     = CHtml::encode($_POST['Mode']);

                              if(($mode == 2 || $mode == 3) && ($tableKey == '' || $csvKey == '')) {
                                    $error = 4;
                              }
                              else {
                                   $error      = 0;
                                   $delimiter  = CHtml::encode(trim($_POST['thirdDelimiter']));
                                   $table      = CHtml::encode($_POST['thirdTable']);
                                   $uploadfile = CHtml::encode(trim($_POST['thirdFile']));
                                   $poles      = $_POST['Poles'];
                                   $perRequest = CHtml::encode($_POST['perRequest']);

                                   /*
                                    * import from csv to db
                                    */

                                   $model=new ImportCsv;
                                   $tableColumns = $model->tableColumns($table);

                                   /*
                                    * select old rows from table
                                    */
                                   if($mode == 2 || $mode == 3) {
                                       $oldItems = $model->selectRows($table, $tableKey);
                                   }


                                   $replace     = addslashes(file_get_contents($uploadfile));
                                   $filecontent = explode("\n", $replace);
                                   $lengthFile  = sizeof($filecontent);
                                   $insertCounter  = 0;
                                   $insertArray  = array();
                                   $error_array = array();
                                   $stepsOk = 0;

                                   for($i=0; $i<$lengthFile; $i++) {
                                       if($i!=0 && $filecontent[$i]!='') {
                                           $csvLine = explode($delimiter, $filecontent[$i]);

                                           /*
                                            * insert All
                                            */

                                           if($mode==1) {
                                               $insertArray[] =  $csvLine;
                                               $insertCounter++;
                                               if($insertCounter == $perRequest || $i == $lengthFile-1) {
                                                    $import = $model->InsertAll($table, $insertArray, $poles, $tableColumns);
                                                    $insertCounter = 0;
                                                    $insertArray = array();

                                                    if($import != 1)
                                                        $arrays[] = $i;
                                               }
                                           }

                                           /*
                                            * Insert new
                                            */
                                           if($mode==2) {
                                                if($csvLine[$csvKey-1]=='' || !$this->searchInOld($oldItems, $csvLine[$csvKey-1], $tableKey)){
                                                    $insertArray[] =  $csvLine;
                                                    $insertCounter++;
                                                    if($insertCounter == $perRequest || $i == $lengthFile-1) {
                                                        $import = $model->InsertAll($table, $insertArray, $poles, $tableColumns);
                                                        $insertCounter = 0;
                                                        $insertArray = array();

                                                        if($import != 1)
                                                            $arrays[] = $i;
                                                    }
                                                }
                                           }

                                           /*
                                            * Insert new and replace old
                                            */
                                           if($mode==3) {

                                                if($csvLine[$csvKey-1]=='' || !$this->searchInOld($oldItems, $csvLine[$csvKey-1], $tableKey)){
                                                    /*
                                                     * insert new
                                                     */

                                                    $linesArray[] =  $csvLine;
                                                    $strCounter++;
                                                    if($strCounter == $perRequest || $i == $lengthFile-1) {
                                                        $import = $model->InsertAll($table, $linesArray, $poles, $tableColumns);
                                                        $strCounter = 0;
                                                        $linesArray = array();

                                                        if($import != 1)
                                                            $arrays[] = $i;
                                                    }
                                                }
                                                else {
                                                    /*
                                                     * replace old
                                                     */
                                                     $import = $model->updateOld($table, $csvLine, $poles, $tableColumns, $csvLine[$csvKey-1], $tableKey);

                                                     if($import != 1)
                                                         $arrays[] = $i;
                                                }
                                           }
                                       }
                                   }

                                   if($insertCounter!=0) $model->InsertAll($table, $insertArray, $poles, $tableColumns);
                              
                                   /*
                                    * save params in file
                                    */
                                   
                                   $this->saveInFile($table, $delimiter, $mode, $perRequest, $csvKey, $tableKey, $tableColumns, $poles, $uploadfile);
                              }
                           }
                           else {
                               $error = 3;
                           }
                       }
                       else {
                           $error = 2;
                       }
                   }
                   else {
                       $error = 1;
                   }

                   $this->layout='clear';
                   $this->render('thirdResult', array(
                        'error'=>$error,
                        'delimiter'=>$delimiter,
                        'table'=>$table,
                        'uploadfile'=>$uploadfile,
                        'error_array'=>$error_array,
                    ));
               }

               Yii::app()->end();
            }
            else {
                /*
                 * first loading
                 */

                $delimiter = ";";
                $this->render('index', array(
                    'delimiter'=>$delimiter,
                    'tablesArray'=>$tablesArray,
                ));
           }
	}

        /*
         * action for file upload
         */
        
        public function actionUpload()
        {
            $uploaddir  = Yii::app()->controller->module->path;
            $uploadfile = $uploaddir.basename($_FILES['myfile']['name']);

            $name_array = explode(".", $_FILES['myfile']['name']);
            $type = end($name_array);

            if($type=="csv") {
                if(move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
                    $importError=0;
                }
                else {
                   $importError=1;
                }
            }
            else {
                $importError=2;
            }

            $this->layout='clear';
            $this->render('firstResult', array(
                 'error'=>$importError,
                 'uploadfile'=>$uploadfile,
            ));
        }

        /*
         * search needle in old rows 
         */
        
        public function searchInOld($array, $needle, $key)
        {
            $return = false;
            $arrayLength = sizeof($array);
            for($i=0; $i<$arrayLength; $i++)
            {
                if($array[$i][$key]==$needle) $return = true;
            }

            return $return;
        }

        /*
         * save params in file
         */

        public function saveInFile($table, $delimiter, $mode, $perRequest, $csvKey, $tableKey, $tableColumns, $poles, $uploadfile)
        {
            $columnsSize = sizeof($tableColumns);
            $columns     = '';
            for($i=0; $i<$columnsSize; $i++) {
                $columns = ($i!=0) ? $columns.', "'.$tableColumns[$i].'"=>'.$poles[$i] : '"'.$tableColumns[$i].'"=>'.$poles[$i] ;
            }
            
            $arrayToFile = '<?php
                $paramsArray = (
                    "table"=>"'.$table.'",
                    "delimiter"=>"'.$delimiter.'",
                    "mode"=>'.$mode.',
                    "perRequest"=>'.$perRequest.',
                    "csvKey"=>"'.$csvKey.'",
                    "tableKey"=>"'.$tableKey.'",
                    "columns"=>array(
                        '.$columns.'
                    ),
                );
            ?>';

            $uploadfileArray = explode(".", $uploadfile);
            $uploadfileArray[sizeof($uploadfileArray)-1] = "php";
            $uploadfileNew = implode(".", $uploadfileArray);

            $fileForWrite = fopen($uploadfileNew,"w+");
            fwrite($fileForWrite, $arrayToFile);
            fclose($fileForWrite);
        }
}