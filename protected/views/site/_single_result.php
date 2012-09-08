<?php 
	if(get_class($data) === 'Article'){ ?>
		<div class='news'>			
		
			<h3><?= $data->title ?></h3>
			<p><?= $data->content ?></p>
			<hr />
		</div>
<?php }else if(get_class($data) === 'Products'){ ?>
		<div class='news'>
			<h3><?= $data->code ?> --- <?= $data->name ?></h3>
			<p><?= $data->description ?></p>
			<hr />
		</div>
	<? } ?>