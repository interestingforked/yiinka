<table class="pagesAdminAll" cellpadding="8" cellspacing="0" border="0" width="100%">
<?php
$controllerId = "pages";
$n = 0;
foreach($this->getPagesAdmin() as $page) {
   if($n == 0) {
?>
    <tr valign='top'>
        <th width='100%' align='left'><?php echo CHtml::encode($page->getAttributeLabel('title')); ?></th>
        <th nowrap width='40px' align='left'><?php echo CHtml::encode($page->getAttributeLabel('id')); ?></th>
        <th nowrap width='100px' align='left'><?php echo CHtml::encode($page->getAttributeLabel('url')); ?></th>
        <th nowrap width='70px'><?=Yii::t('yiinka', 'Options');?></th>
    </tr>
<?php
   }
	echo ("<tr valign='top'><td>".$page->title."</td><td>".$page->id."</td><td>".$page->url."</td><td nowrap>");

	$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('url'=>array('view', 'url'=>$page->url), 'itemOptions'=>array('class'=>'adminList', 'title'=>Yii::t('yiinka', 'View'))),
			array('url'=>array($controllerId.'/update', 'id'=>$page->id), 'itemOptions'=>array('class'=>'adminUpdate', 'title'=>Yii::t('yiinka', 'Update'))),
			array('url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$page->id),'confirm'=>Yii::t('zii', 'Are you sure you want to delete this item?')), 'itemOptions'=>array('class'=>'adminDelete', 'title'=>Yii::t('yiinka', 'Delete'))),
		),
		'htmlOptions'=>array('class'=>'adminUl'),
		'linkLabelWrapper'=>'div',
	));

        echo("</td></tr>");
        $n++;
}
?>
    <tr valign='top'>
        <td colspan='3'>&nbsp;</td>
       <td>
    <?php
    if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1 && Yii::app()->user->getState('mode')==1) {
            $controllerId = "pages";
            $positionId = $model->id;

            $this->widget('zii.widgets.CMenu', array(
                    'items'=>array(
                            array('url'=>array($controllerId.'/create'), 'itemOptions'=>array('class'=>'adminCreate', 'title'=>Yii::t('yiinka', 'Create'))),
                    ),
                    'htmlOptions'=>array('class'=>'adminUl'),
                    'linkLabelWrapper'=>'div',
            ));
    }
    ?>
       </td>
    </tr>
</table>