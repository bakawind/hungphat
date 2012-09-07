<?php
$this->breadcrumbs=array(
	'Product Photoses',
);

$this->menu=array(
	array('label'=>'Create ProductPhotos', 'url'=>array('create')),
	array('label'=>'Manage ProductPhotos', 'url'=>array('admin')),
);
?>

<h1>Product Photoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
