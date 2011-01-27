<?php

Yii::import('zii.widgets.CPortlet');
 
class AdminPanel extends CPortlet
{	
	protected function renderContent()
    {
        $this->render('adminPanel');
    }
}

?>
