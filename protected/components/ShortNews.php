<?php

Yii::import('zii.widgets.CPortlet');
 
class ShortNews extends CPortlet
{
	public $limits = 3;
	
	public function getShortNews()
    {
        return News::model()->findShortNews($this->limits);
    }
	
	protected function renderContent()
    {
        $this->render('shortNews');
    }
}

?>
