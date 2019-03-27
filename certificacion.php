<?php
sleep(1);
include('abredb.php');
if($_REQUEST)
{
	$RUT 	= $_REQUEST['rut'];
	$sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '$RUT' and Asiste_curso = 'SI'";
	$results = mysql_query( $sql ) or die('ok');
	
	if(mysql_num_rows(@$results) <= 0) // not available
	{
		echo '1';
	}
	else
	{
		echo 'Success';
	}
	
}
include('cierra_db.php');

?>