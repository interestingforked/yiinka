<?php

class InstrumentsController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'index' actions
				'actions'=>array('index', 'phpinfo'),
				'expression'=>'!$user->isGuest && $user->role==1',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all instruments
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	* phpinfo() action
	*/
	public function actionPhpinfo()
	{
		$this->layout='//layouts/clear';
		$this->render('phpinfo');
	}
}
