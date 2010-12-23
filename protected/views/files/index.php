<?php 
$this->pageTitle=Yii::t('yiinka', 'User files');

$this->breadcrumbs=array(
	Yii::t('yiinka', 'User files'),
);

echo('<h1>'.$this->pageTitle.'</h1>');

$this->widget('application.extensions.elfinder.ElFinderWidget',array(
    'lang'=>'ru',
    'url'=>CHtml::normalizeUrl(array('site/fileManager')),
    'editorCallback'=>'js:function(url) {
        var funcNum = window.location.search.replace(/^.*CKEditorFuncNum=(d+).*$/, "$1");
        window.opener.CKEDITOR.tools.callFunction(funcNum, url);
        window.close();
    }',
));
?>