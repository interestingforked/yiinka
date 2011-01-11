<?php

class DefaultController extends Controller
{
        /* action for form */
    
	public function actionIndex()
	{
           /* publish css and js*/

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

           /* getting all tables from db */

           $tables = Yii::app()->getDb()->getSchema()->getTableNames();

           $tablesLength = sizeof($tables);
           $tablesArray = array();
           for($i=0; $i<$tablesLength; $i++) {
                $tablesArray[$tables[$i]] = $tables[$i];
           }
                
           if(Yii::app()->request->isAjaxRequest){
                /* second step */
               
                $delimiter = CHtml::encode($_POST['delimiter']);
                $table = CHtml::encode($_POST['table']);
                
                if($delimiter=="") {
                    $error=1;
                }
                else {
                    $error=0;
                }
                
                $this->layout='clear';
                $tableColumns = $this->tableColumns($table);

                $this->render('secondResult', array(
                    'error'=>$error,
                    'tableColumns'=>$tableColumns,
                ));
                
                Yii::app()->end();
            }
            else {
                /* first loading */
                $delimiter = ";";
                $this->render('index', array(
                    'delimiter'=>$delimiter,
                    'tablesArray'=>$tablesArray,
                ));
           }
	}

        /* action for file upload */
        
        public function actionUpload()
        {
            $uploaddir  = Yii::app()->controller->module->path;
            $uploadfile = $uploaddir.basename($_FILES['myfile']['name']);

            $name_array = explode(".", $_FILES['myfile']['name']);
            $type = end($name_array);

            if($type=="csv") {
                if(move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
                    $error=0;
                }
                else {
                   $error=1;
                }
            }
            else {
                $error=2;
            }

            $this->layout='clear';
            $this->render('firstResult', array(
                 'error'=>$error,
            ));
        }

        /* get poles from selected table */
        
        public function tableColumns($table)
        {
            return Yii::app()->getDb()->getSchema()->getTable($table)->getColumnNames();
        }
}