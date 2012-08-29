<?php
$this->breadcrumbs=array(
	'Product Photoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductPhotos', 'url'=>array('index')),
	array('label'=>'Create ProductPhotos', 'url'=>array('create')),
	array('label'=>'Update ProductPhotos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductPhotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductPhotos', 'url'=>array('admin')),
);
?>

<h1>View ProductPhotos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(// Hung - view image
            'label'=>'Show Image',
            'type'=>'raw',
            'value'=>$model->getThumbnail(),
        ),
		'product_id',
	),
)); ?>
