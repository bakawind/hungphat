<div class='banner'>
	<div id="SliderName_2" class="SliderName_2">
		<!--<div class="SliderName_2Description">Fist banner</div>-->
        <?=CHtml::image("/images/banners/banner1.jpg", '', array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 first", 'usemap'=>"#img1map"))?>
        <?=CHtml::image("/images/banners/banner2.jpg", '', array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 first", 'usemap'=>"#img1map"))?>
        <?=CHtml::image("/images/banners/banner3.jpg", '', array('width'=>"900", 'height'=>"350", 'title'=>"Demo2 first", 'usemap'=>"#img1map"))?>
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
<div class='categories'>
    <div class='category' style='margin-left: 10px;'>
        <a href='/products/list?type=doll'>
            <div id='doll'></div>
            BÚP BÊ SINFA
        </a>
    </div>
    <div class='category'>
        <a href='/products/list?type=robot'>
            <div id='robot'></div>
            RÔ BÔ RÁP HÌNH
        </a>
    </div>
    <div class='category'>
        <a href='/products/list?type=toy'>
            <div id='toys'></div>
            VỈ ĐỒ CHƠI GIA ĐÌNH
        </a>
    </div>
</div> <!--close category-->
<div class='space'></div>
<div class='container'>
    <div class='price_search'>
        <h1>TÌM THEO GIÁ</h1>
        <table>
            <tr>
                <td> Từ: </td>
                <td>
                    <select>
                        <option>0</option>
                        <option>50.000</option>
                        <option>100.000</option>
                        <option>200.000</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Đến:</td>
                <td>
                    <select>
                        <option>0</option>
                        <option>50.000</option>
                        <option>100.000</option>
                        <option>200.000</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type='button' value='Tìm Kiếm'/>
    </div><!--close price_search-->
    <div class='about_us_box'>
        <fieldset>
            <legend><h1>NÓI VỀ CHÚNG TÔI:</h1></legend>
            Cơ sở sản xuất và lắp ráp đồ chơi trẻ em Hưng Phát được thành lập vào ngày 15 tháng 10 năm 2001. Tại địa chỉ 118 Lò Siêu, Phường 12, Quận 11, thành phố Hồ Chí Minh, sau 12 năm hoạt động đã mở thêm chi nhánh cơ sở Hưng Phát 2 được thành lập ngày 11 tháng 6 năm 2011, tại ấp 5, xã Nhân Nghĩa, huyện Cảm Mỹ, tỉnh Đồng Nai ...
      </fieldset>
      <a href='/site/about'><?=CHtml::image("/images/more_btn.png", '', array('id'=>'more_btn'))?></a>
    </div>
</div> <!--close container-->
<br class='clear'/>
