<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */

$this->breadcrumbs=array(
	'Price Ranges'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PriceRange', 'url'=>array('index')),
	array('label'=>'Create PriceRange', 'url'=>array('create')),
	array('label'=>'Update PriceRange', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PriceRange', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PriceRange', 'url'=>array('admin')),
);
?>

<h1>View PriceRange #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'from_price',
		array(// Hung - view image
            'label'=>'From Price',
            'type'=>'raw',
            'value'=>Util::displayMoney($model->from_price) . ' đ',
        ),	
		//'to_price',
		array(// Hung - view image
            'label'=>'To Price',
            'type'=>'raw',
            'value'=>Util::displayMoney($model->to_price) . ' đ',
        ),	
	),
)); ?>
