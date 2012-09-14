<?php
$categories = Categories::model()->findAll();
$width = 100/count($categories);
?>
<div class='categories'>
<style>
.wrapper .content .categories .category{
    float: left;
    width: <?=$width?>%;
    height: 200px;
    text-align: center;
}
.category .cate_image{
    height: 200px;
    width: 100%;
}
.category .cate_image img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 200px;
    width: auto;
}
.category .cate_image img:hover{
    height: 170px;
    padding-top: 10px;
}
</style>
<?php
foreach($categories as $c) {
?>
    <div class='category'>
        <a href='/products/list?type=<?= $c->name ?>'>
            <div class='cate_image'> <img src='<?= $c->image ?>' alt='<?= $c->caption ?>'/> </div>
            <div> <?= $c->caption ?> </div>
        </a>
    </div>
<? } ?>
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
