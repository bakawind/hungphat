<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'Update Categories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>View Categories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'caption',
		array(// Hung - view image
            'label'=>'Show Banner',
            'type'=>'raw',
            'value'=>CHtml::image($model->banner, $model->caption, array('width'=>"500"))
        ),
		array(// Hung - view image
            'label'=>'Show Image',
            'type'=>'raw',
            'value'=>CHtml::image($model->image, $model->caption, array())
        ),
	),
)); ?>
<br />

List of Products belong to <?= $model->caption?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-photos-grid',
	'dataProvider'=>$listOfProducts,
	'columns'=>array(
		'id',
		'code',
		'name',
		//'image',
		'price',
		array(
			'type'=>'raw',
			'header'=>'Picture',
			'value'=> 'CHtml::image($data->image,$data->image, array("width"=>150))',
			),
		/*
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl' => 'array("products/view",
            "id"=>$data->id)',
            'updateButtonUrl' => 'array("products/update",
            "id"=>$data->id)',
            'deleteButtonUrl' => 'array("products/delete",
            "id"=>$data->id)',
        ),*/
	),
));
?>
