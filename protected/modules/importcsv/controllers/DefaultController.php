<?php

class DefaultController extends Controller
{
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
                                   $strCounter  = 0;
                                   $linesArray  = array();
                                   $error_array = array();
                                   $stepsOk = 0;

                                   for($i=0; $i<$lengthFile; $i++) {
                                       if($i!=0 && $filecontent[$i]!='') {
                                           $csvLine = explode($delimiter, $filecontent[$i]);

                                           /*
                                            * insert All
                                            */

                                           if($mode==1) {
                                               $linesArray[] =  $csvLine;
                                               $strCounter++;
                                               if($strCounter == $perRequest || $i == $lengthFile-1) {
                                                    $import = $model->InsertAll($table, $linesArray, $poles, $mode, $tableColumns);
                                                    $strCounter = 0;
                                                    $linesArray = array();

                                                    if($import != 1)
                                                        $arrays[] = $i;
                                               }
                                           }

                                           /*
                                            * Insert new
                                            */
                                           if($mode==2) {
                                                //if(in_array($csvLine[$csvKey-1], $oldItems[$tableKey])) echo("yes");
                                                echo($csvLine[$csvKey-1]."<pre>");
                                                print_r($oldItems);
                                                echo("</pre>");
                                           }

                                           /*
                                            * Insert new and replace old
                                            */
                                           if($mode==3) {

                                           }
                                       }
                                   }
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
}