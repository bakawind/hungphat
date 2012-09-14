<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider_thumbnial.css" />

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sliderman.1.3.7.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
    <div class = "header">
        <?
        $controllers = array(
            'article'=>'News',
            'products'=>'Products',
            'orders'=>'Orders',
            'categories'=>'Categories',
        );
        ?>
        <ul class='menu'>
            <li>
                <?=CHtml::link('Home', '/site/index')?>
            </li>
            <li>
                <?=CHtml::link('About', '/site/editAbout')?>
            </li>
            <?php foreach ($controllers as $id=>$value) { ?>
            <li class="<?= $this->getId()==$id ? 'active' : '' ?>">
                <?= CHtml::link($value, array($id.'/admin')) ?>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class='wrapper'>
        <div class='content'>
            <div class='space'></div>
	            <?php echo $content; ?>
            <div class='space'></div>
            <br class='clear'/>
        </div><!--close content -->
    </div><!--close wrapper-->
</body>
</html>
