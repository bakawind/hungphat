<div class='container solid_background'>
<h1>Thông tin hóa đơn #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'address',
		'phone',
		//'status',
		//array(// Hung - view image
        //    'label'=>'Status',
        //    'type'=>'raw',
        //    'value'=>Orders::model()->getStatusName($model->status),
        //),
		//'total',
		array(// Hung - view image
            'label'=>'Tổng cộng',
            'type'=>'raw',
            'value'=>Util::displayMoney($model->total) . ' đ',
        ),
		//'created_date',
		array(
			'type'=>'raw',
			'label'=>'Ngày tạo',
			'value'=> date("d-m-Y H:i:s",strtotime($model->created_date)),
			),
	),
)); ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orderDetail-grid',
	'dataProvider'=>$orderItems,
	'columns'=>array(
		array(
			'type'=>'raw',
			'header'=>'Tên sản phẩm',
			'value'=>'Products::model()->findByPk($data->product_id)->name',
			),
		'quantity',
		array(
			'type'=>'raw',
			'header'=>'Đơn giá',
			'value'=>'Util::displayMoney(Products::model()->findByPk($data->product_id)->price)." đ"',
			),
	),
));
?>
</div>
