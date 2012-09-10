<?php
$categories = Categories::model()->findAll();
?>
<div class='banner'>
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
				loading: {background: '#000000', opacity: 0.5, image: 'images/loading.gif'},
				buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
				description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
				//navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
			}
		});
	</script>
</div><!--close banner-->
<div class='space'></div>

<div class='container solid_background'>
    <h1><?= $model->title ?></h1>
    <hr/><br/>
    <div><?= $model->content ?></div>
</div>