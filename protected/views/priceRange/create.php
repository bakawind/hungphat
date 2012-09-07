<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */

$this->breadcrumbs=array(
	'Price Ranges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PriceRange', 'url'=>array('index')),
	array('label'=>'Manage PriceRange', 'url'=>array('admin')),
);
?>

<h1>Create PriceRange</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>