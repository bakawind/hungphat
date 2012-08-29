<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Create Orders', 'url'=>array('create')),
	array('label'=>'Update Orders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Orders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<h1>View Orders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'address',
		'phone',
		'status',
		'total',
		'created_date',
	),
)); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-detail-grid',
	'dataProvider'=>$orderDetails,	
	'columns'=>array(
		'id',
		'quantity',	
		'product_id',
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl' => 'array("orderItems/view",
            "id"=>$data->id)',
            'updateButtonUrl' => 'array("orderItems/update",
            "id"=>$data->id)',
            'deleteButtonUrl' => 'array("orderItems/delete",
            "id"=>$data->id)',
        ),
	),
)); 
?>

<?=CHtml::link('Choose more Items', '/orderItems/create?o_id=' . $model->id )?>