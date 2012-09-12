
<?php
$id = 'happystorm_12'; 
 $status = file_get_contents("http://opi.yahoo.com/online?u=$id&m=a&t=1");
if ($status === '00')
	echo 'off';
elseif ($status === '01')
	echo 'on';  
?>