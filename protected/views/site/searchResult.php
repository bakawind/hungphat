<?php ?>

<div class='inner_content'>
	

	
<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$articleResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    )); ?>
	
	<br class='clear' />
	
	<?php 
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$productResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    )); ?>
	
	
</div> <!-- end inner content-->
