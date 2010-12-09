<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!--[if IE]>
		<script type="text/javascript">
			document.createElement("section");
			document.createElement("header");
			document.createElement("footer");
			document.createElement("nav");
		</script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<?php if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/system.css" />
	<?php }?>
</head>

<body>
	<section>
		<?php if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role')==1)  $this->widget('AdminPanel'); ?>
		<header>
			<div class="headerLeft">
				<a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" border="0"/></a>
			</div>
			<div class="headerRight">
				phone.: <span class="size16">(000) 000-00-00 (000)</span><br/>
				e-mail: <span class="size16">info@yiinka.demo</span>
			</div>
			<nav>
				<?php $this->widget('TopMenu');?>
			</nav>
		</header>
		<div class="contentLeft">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?>
			<br/>
			<?php echo $content; ?>
		</div>
		<div class="contentRight">
			<strong>Новости</strong><br/><br/>
			<?php $this->widget('ShortNews');?>
		</div>
		<div class="push">&nbsp;</div>	
	</section>
	<footer>
		<div class="footerLeft">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Вакансии', 'url'=>array('/pages/view', 'id'=>7)),
					array('label'=>'Новости', 'url'=>array('/news/index')),
					array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
		</div>
		<div class="footerRight">
			CMS Yiinka Demo Site,    <?php echo date('Y'); ?><br/>
			powered by <a href="http://yiiframework.com" target="_blank">Yii Framework</a> & <a href="#">CMS Yiinka</a>
		</div>
	</footer>
</body>
</html>