<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */

$this->breadcrumbs=array(
	'Price Ranges'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PriceRange', 'url'=>array('index')),
	array('label'=>'Create PriceRange', 'url'=>array('create')),
	array('label'=>'View PriceRange', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PriceRange', 'url'=>array('admin')),
);
?>

<h1>Update PriceRange <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>