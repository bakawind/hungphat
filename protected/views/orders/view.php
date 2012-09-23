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
		//'status',
		array(// Hung - view image
            'label'=>'Status',
            'type'=>'raw',
            'value'=>Orders::model()->getStatusName($model->status),
        ),
		//'total',
		array(// Hung - view image
            'label'=>'Total',
            'type'=>'raw',
            'value'=>Util::displayMoney($model->total) . ' đ',
        ),		
		//'created_date',
		array(			
			'type'=>'raw',
			'label'=>'Created date',                                
			'value'=> date("d-m-Y H:i:s",strtotime($model->created_date)),			
			),
	),
)); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orderDetail-grid',
	'dataProvider'=>$orderDetails,		
	'columns'=>array(
		'id',
		'quantity',
		//'product_id',
		array(			
			'type'=>'raw',
			'header'=>'Product Code',                                
			'value'=>'Products::model()->getProductCode($data->product_id)',			
			'name'=>'product_code',				
			),	
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
<form action="../orderItems/create" method="post">
	<input type="hidden" name="o_id" value="<?= $model->id ?>"/>
	<input type="submit" value="Choose more Items" />
</form>
<!--?=CHtml::link('Choose more Items', '/orderItems/create?o_id=' . $model->id )?-->