<?
$controllers = array(
    'article'=>'News',
    'products'=>'Products',
    'orders'=>'Orders',
    'categories'=>'Categories',
);

?>
<div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
         <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse">
          <ul class="nav">
            <?php foreach ($controllers as $id=>$value) { ?>
            <li class="<?= $this->getId()==$id ? 'active' : '' ?>">
                <?= CHtml::link($value, array($id.'/admin')) ?>
            </li>
            <?php } ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
</div>

