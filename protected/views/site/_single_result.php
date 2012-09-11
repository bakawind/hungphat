
<div class='searchResult'>	
<?php 
	if(get_class($data) === 'Article'){ ?>
				
			<?=CHtml::image($data->image)?>
			<h3><?= $data->title ?></h3>
			<p><?= $data->content ?></p>
			<hr />
		
		
<?}else if(get_class($data) === 'Products'){ ?>
		
			<?=CHtml::image($data->image)?>
			<h3><?= $data->code ?> --- <?= $data->name ?></h3>
			<p><?= $data->description ?></p>
			<hr />
		
	<? } ?>
</div>