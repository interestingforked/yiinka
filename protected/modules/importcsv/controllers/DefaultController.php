<?php

class DefaultController extends Controller
{
        public $path;
        public $tablesArray = array();
        
	public function actionIndex()
	{
           Yii::app()->clientScript->registerCssFile(
                Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('application.modules.importcsv.assets').'/styles.css'
                )
            );

           $tables = Yii::app()->getDb()->getSchema()->getTableNames();

           $tablesLength = sizeof($tables);

           for($i=0; $i<$tablesLength; $i++) {
                $this->tablesArray[$tables[$i]] = $tables[$i];
           }

            $this->render('index');
	}
}