<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'price',
		'description',
		//'image',
		array(// Hung - view image
            'label'=>'Show Image',
            'type'=>'raw',
            'value'=>$model->getThumbnail(),
        ),
		//'modified_date',		
		array(			
			'type'=>'raw',
			'label'=>'Modified date',                                
			'value'=> date("d-m-Y H:i:s",strtotime($model->modified_date)),			
			),	
		//'category_id',
		array(			
			'type'=>'raw',
			'label'=>'Category',                                
			'value'=> Categories::model()->getCategoryCaption($model->category_id),			
			),	
		//'available',
		array(
            'label'=>'Available',
            'type'=>'raw',
            'value'=>Products::model()->getAvailableString($model->available),
        ),
	),
)); ?>
<br/>
List of slider Photo
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-photos-grid',
	'dataProvider'=>$photoData,	
	'columns'=>array(
		'id',
		'url',
		array(			
			'type'=>'raw',
			'header'=>'Picture',                                
			'value'=> 'CHtml::image($data->url,$data->url, array("width"=>100))',			
			),	
		
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl' => 'array("productPhotos/view",
            "id"=>$data->id)',
            'updateButtonUrl' => 'array("productPhotos/update",
            "id"=>$data->id)',
            'deleteButtonUrl' => 'array("productPhotos/delete",
            "id"=>$data->id)',
        ),
	),
)); 
?>

<?=CHtml::link('Create new Photo', '/productPhotos/create?p_id=' . $model->id )?>

