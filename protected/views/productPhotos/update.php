<?php
$this->breadcrumbs=array(
	'Product Photoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductPhotos', 'url'=>array('index')),
	array('label'=>'Create ProductPhotos', 'url'=>array('create')),
	array('label'=>'View ProductPhotos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductPhotos', 'url'=>array('admin')),
);
?>

<h1>Update ProductPhotos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>