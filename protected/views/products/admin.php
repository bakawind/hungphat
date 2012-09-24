<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('ajaxupdate', "
$('#products-grid a.ajaxupdate').live('click', function() {		
        $.fn.yiiGridView.update('products-grid', {
                type: 'POST',
                url: $(this).attr('href'),
                success: function() {
                        $.fn.yiiGridView.update('products-grid');
                }
        });
        return false;
});
");

?>

<h1>Manage Products</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',		
		array(
			'header'=>'&nbsp;Up&nbsp;',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::image("../images/up.png"), array("products/up", "id"=>$data->id), array("class"=>"ajaxupdate"))',			
			),
		'code',
		'name',
		//'price',
		array(
            'name'=>'price',
            'header'=>'Price',            
            'value'=>'Util::displayMoney($data->price) . " đ"',
        ),
		//'available',
		array(
            'name'=>'available',
            'header'=>'Available',
            'filter'=>array('0'=>'Hết hàng','1'=>'Còn hàng'),
            'value'=>'Products::model()->getAvailableString($data->available)',
        ),
		array(			
			'type'=>'raw',
			'header'=>'Picture',                                
			'value'=> 'CHtml::image($data->image,$data->image, array("width"=>100))',			
			),		
		//'modified_date',
		//'category_id',
		array(
            'name'=>'category_id',
            'header'=>'Category',
            'filter'=>CHtml::listData(Categories::model()->findAll(), 'id', 'caption'),
            'value'=>'Categories::model()->getCategoryCaption($data->category_id)',
        ),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
