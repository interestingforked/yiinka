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

                        $tableColumns = $this->tableColumns($table);
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
                       $error = 0;
                       $delimiter = CHtml::encode(trim($_POST['thirdDelimiter']));
                       $table = CHtml::encode($_POST['thirdTable']);
                       $uploadfile = CHtml::encode(trim($_POST['thirdFile']));

                       /*
                        * import from csv to db
                        */
                       
                       $filecontent  = explode("\n", file_get_contents($uploadfile));
                       $lengthFile = sizeof($filecontent);
                       for($i=0; $i<$lengthFile; $i++) {
                           $csvLine = explode($delimiter, $filecontent[$i]);
                       }

                       $sql="INSERT INTO ".$table."(text, title) VALUES(1, 2)";
                       $command=Yii::app()->db->createCommand($sql);
                       $command->execute();
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
         * get poles from selected table 
         */
        
        public function tableColumns($table)
        {
            return Yii::app()->getDb()->getSchema()->getTable($table)->getColumnNames();
        }
}