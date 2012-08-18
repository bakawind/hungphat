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

<div class="container" id="page">

    <div class = "header">
        <ul class='menu'>
            <li>
                <a href='home.html'>Trang chủ</a>
            </li>
            <li>
                <a href='product.html'>Sản phẩm</a>
               <ul class="subnav">
                    <li><a href="/video/index/channel/featuredvids">Búp bê Sinfa</a></li>
                    <li><a href="/video/index/channel/gdbhighlights">Rô bô ráp hình</a></li>
                    <li><a href="/video/index/channel/gdbhighlights">Vỉ đồ chơi ráp hình</a></li>
                </ul>
            </li>
            <li>
                <a href='about.html'>Giới thiệu</a>
            </li>
            <li>
                <a href='pay_method.html'>Thanh Toán</a>
            </li>
            <li>
                <a href='contact.html'>Liên hệ</a>
            </li>
        </ul>
    </div>
    <div class='wrapper'>
        <div class='space'></div>
        <div class='container'>
            <div class='cart'>
                <img src="images/cart.png"/>
                <p id='view_count'>Lượt truy cập: 103</p>
                <p id='cart_detail'>2 (click để xem giỏ hàng)</p>
            </div>
            <div class='search'>
                <input type='textfield'/>
                <img src='images/search.png'/>
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
