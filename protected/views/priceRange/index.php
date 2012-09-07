<?php
/* @var $this PriceRangeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Price Ranges',
);

$this->menu=array(
	array('label'=>'Create PriceRange', 'url'=>array('create')),
	array('label'=>'Manage PriceRange', 'url'=>array('admin')),
);
?>

<h1>Price Ranges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
