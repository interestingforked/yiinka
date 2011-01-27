<?php

Yii::import('zii.widgets.CPortlet');
 
class TopMenu extends CPortlet
{
	public $parentPage = 0;
	
	public function getTopMenu()
    {
        return Pages::model()->findTopMenu($this->parentPage);
    }
	
	protected function renderContent()
    {
        $this->render('topMenu');
    }
}

?>
