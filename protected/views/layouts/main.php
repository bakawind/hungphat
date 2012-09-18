<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider_thumbnial.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sliderman.1.3.7.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<script>
	function loadXMLDoc()
	{
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		else{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("online_service_id").innerHTML=xmlhttp.responseText;
			}
		};

		xmlhttp.open("GET","/site/yahoo",true);
		xmlhttp.send(null);
		//document.getElementById("test_1").innerHTML=xmlhttp.responseText;
	}
</script>

</head>

<body onload="loadXMLDoc()">

<div>

    <div class = "header">
        <ul class='menu'>
            <li class="maniNav">
                <?=CHtml::link('Trang chủ', '/site/index')?>
            </li>
            <li class="maniNav">
                <?=CHtml::link('Sản phẩm', '')?>
               <ul class="subnav">
                <?php
                $categories = Categories::model()->findAll();
                foreach($categories as $c){
                ?>
                    <li><?=CHtml::link($c->caption, '/products/list?type='.$c->name)?></li>
                <? } ?>
                </ul>
            </li>
            <li class="maniNav">
                <?=CHtml::link('Giới thiệu', '/site/about')?>
            </li>
            <li class="maniNav">
                <?=CHtml::link('Thanh Toán', '/cart/index')?>
            </li>
            <li class="maniNav">
                <?=CHtml::link('Liên hệ', '/site/contact')?>
            </li>
			<li class="maniNav">
                <?=CHtml::link('Tin tức', '/article/index')?>
            </li>
        </ul>
    </div>
    <div class='wrapper'>
        <div class='small_space'></div>
        <div class='container'>
			<div class='upper_part'>
				<div class='small_cart'>
					<?=CHtml::image("/images/cart.png")?>
					<?php $cart = $this->getCart(); ?>
					<p id='cart_detail'><a href='/cart/index'><?=$cart->getNumberOfItems()?> (click để xem giỏ hàng)</a></p>
				</div>
				<div class='search'>
					<form  action="/site/search" type="GET"  >
						<input type='textfield' name="text" class="searchTextField"/>
						<INPUT TYPE="image" SRC="/images/search.png" width="auto" height="50" ALT="Submit Form">
					</form>
				</div>
			</div>
        </div>
        <br class='clear'/>
        <div class='content'>
            <div class='space'></div>
            <div class='banner'>
            <?php
            $categories = Categories::model()->findAll();
            $controllerId = $this->getId();
            if($controllerId !== 'article'){
                if(isset($_GET['type']) && $_GET['type']!=null) {
                    $categories = array();
                    array_push($categories, Categories::model()->find('name=:name', array(':name'=>$_GET['type'])));
                }
                if(isset($_GET['id']) && $_GET['id']!=null) {
                    $product = Products::model()->findByPk($_GET['id']);
                    $categories = array();
                    array_push($categories, Categories::model()->find('id=:id', array(':id'=>$product->category_id)));
                }
            }
            ?>
            	<div id="SliderName_2" class="SliderName_2">
                    <?php
                        foreach($categories as $c) {
                    ?>
            		    <!--<div class="SliderName_2Description">Fist banner</div>-->
                        <?=CHtml::image($c->banner, $c->caption, array('width'=>"900", 'height'=>"350", 'title'=>$c->caption, 'usemap'=>"#img1map"))?>
                    <?php } ?>
            	</div>
            	<div class="c"></div>
            	<div id="SliderNameNavigation_2"></div>
            	<div class="c"></div>

            	<script type="text/javascript">
            		effectsDemo2 = 'rain,stairs,fade';
            		var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 900, height: 350, effects: effectsDemo2,
            			display: {
            				autoplay: 3000,
            				loading: {background: '#000000', opacity: 0.5, image: '/images/loading.gif'},
            				buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
            				description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
            				//navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
            			}
            		});
            	</script>
            </div><!--close banner-->
            <div class='space'></div>
	            <?php echo $content; ?>
            <div class='small_space'></div>
        </div><!--close content -->
    </div><!--close wrapper-->


	<div class='footer'>
		<div class='footer_content'>
			<div class='online_service' id="online_service_id">
			<?php
                $emails = $this->getEmail();
			?>
				<div class="yahoo">
					<a href="ymsgr:SendIM?<?php echo $emails['email1']?>" title="<?php echo $emails['email1']?>">
						<img src="/images/offline.png" >
					</a>
				</div>
				<div class="yahoo">
					<a href="ymsgr:SendIM?<?php echo $emails['email2']?>" title="<?php echo $emails['email2']?>">
						<img src="/images/offline.png" >
					</a>
				</div>
			</div>

			<div class='contact' >
				<div class='space'></div>
				<div class='phoneIcon'>
					<img src="/images/phone.png" />
				</div>
				<div class='info'> 0839 623 425 </div>
				<div class='phoneIcon'>
					<img src="/images/cellphone.png" />
				</div>
				<div class='info'> 0913 925 396 </div>
			</div>
			<div class='slogan'>
				<p>Cơ sở Hưng Phát chuyên lắp ráp đồ chơi trẻ em các loại</p>
			</div>

		</div>
	</div><!--close footer-->

</body>
</html>
