<?php

Yii::import('zii.widgets.CPortlet');

class PagesAdmin extends CPortlet
{
    public $parentPage = 0;

    public function getPagesAdmin()
    {
        return Pages::model()->findAdminPages($this->parentPage);
    }

    protected function renderContent()
    {
        $this->render('pagesAdmin');
    }
}

?>
