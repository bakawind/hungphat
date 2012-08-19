<div class='banner'>
	<div id="SliderName_2" class="SliderName_2">
                
		<?=CHtml::image("/images/banners/banner1.jpg",'',array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 first", 'usemap'=>"#img1map")) ?>
		<?=CHtml::image("/images/banners/banner2.jpg",'',array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 second", 'usemap'=>"#img1map")) ?>
		<?=CHtml::image("/images/banners/banner3.jpg",'',array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 third", 'usemap'=>"#img1map")) ?>
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
<div class='container contact_us'>
    <img src='images/contact.png'/>
    <div class='contact_form'>
        <h1>Hãy liên hệ với chúng tôi</h1>
        <form id='contact_us' method='POST' action=''>
            <table>
                <tr>
                    <td>Tên:</td>
                    <td><input type='textfield'/></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type='textfield'/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type='textfield'/></td>
                </tr>
                <tr>
                    <td>Điện thoại:</td>
                    <td><input type='textfield'/></td>
                </tr>
                <tr>
                    <td>Tiêu đề::</td>
                    <td><input type='textfield'/></td>
                </tr>
                <tr>
                    <td>Nội dung:</td>
                    <td><textarea></textarea></td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type='submit' value='Gửi'/></td>
                </tr>
            </table>
        </form>
    </div>
</div>
