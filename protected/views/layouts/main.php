<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site.css" />

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sliderman.1.3.7.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div>

    <div class = "header">
        <ul class='menu'>
            <li>
                <?=CHtml::link('Trang chủ', '/site/index')?>
            </li>
            <li>
                <?=CHtml::link('Sản phẩm', '/products/index')?>
               <ul class="subnav">
                    <li><?=CHtml::link('Búp bê Sinfa', '/products/dolls')?></li>
                    <li><?=CHtml::link('Rô bô ráp hình', '/products/robots')?></li>
                    <li><?=CHtml::link('Vỉ đồ chơi ráp hình', '/products/toys')?></li>
                </ul>
            </li>
            <li>
                <?=CHtml::link('Giới thiệu', '/site/about')?>
            </li>
            <li>
                <?=CHtml::link('Thanh Toán', '/site/payment')?>
            </li>
            <li>
                <?=CHtml::link('Liên hệ', '/site/contact')?>
            </li>
			<li>
                <?=CHtml::link('Tin tức', '/site/article')?>
            </li>
        </ul>
    </div>
    <div class='wrapper'>
        <div class='space'></div>
        <div class='container'>
            <div class='cart'>
                <?=CHtml::image("/images/cart.png")?>
                <p id='view_count'>Lượt truy cập: 103</p>
                <p id='cart_detail'>2 (click để xem giỏ hàng)</p>
            </div>
            <div class='search'>
                <input type='textfield'/>
                <?=CHtml::image("/images/search.png")?>
            </div>
        </div>
        <br class='clear'/>
        <div class='content'>
            <div class='space'></div>
	            <?php echo $content; ?>
            <div class='space'></div>
        </div><!--close content -->
    </div><!--close wrapper-->
	<div class='footer'>
		<div class='footer_content'>
			<div class='online_service'>
				<div class='unavailable' >
				</div>
				<div class='available' >
				</div>
			</div>
			<div class='contact' >
				<div class='space'></div>
				<div class='deskPhone'></div>
				<div class='info'> : 0839 623 425 </div>
				<div class='mobile'></div>
				<div class='info'> : 0913 925 396 </div>
			</div>
			<div class='slogan'>
				<p>Cơ sở Hưng Phát chuyên lắp ráp đồ chơi trẻ em các loại</p>
			</div>

		</div>
	</div><!--close footer-->

</body>
</html>
