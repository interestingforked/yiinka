<?php

class FilesController extends Controller
{
	/*public function actions()
    {
        return array(
			// Обработчик сообщений от файл-менеджера
            'fileManager'=>array(
                'class'=>'ext.elfinder.ElFinderAction',
            ),
        );
    }*/
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'index' actions
				'actions'=>array('index', 'browse'),
				'expression'=>'!$user->isGuest && $user->role==1',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all files
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * Lists all files
	 */
	public function actionBrowse()
	{
		$this->layout='//layouts/clear';
		$this->render('index');
	}
}
