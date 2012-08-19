<?php
$this->breadcrumbs=array(
	'Product Photoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductPhotos', 'url'=>array('index')),
	array('label'=>'Manage ProductPhotos', 'url'=>array('admin')),
);
?>

<h1>Create ProductPhotos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>