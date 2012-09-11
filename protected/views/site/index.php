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
    <div class='news_box'>
        <fieldset>
            <legend><h1>Tin mới:</h1></legend>
            <div class='small_news'>
            <?php
                if(isset($news)){
                    foreach($news as $n) {
            ?>
                <div><a href='/article/view/<?=$n->id?>'><?=$n->title?></a></div>
                <hr/>
            <?php
                    }
                }
            ?>
            </div>
      </fieldset>
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
