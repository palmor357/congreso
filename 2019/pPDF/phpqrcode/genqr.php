<?php
// include QR_BarCode class
sleep(1);
header("Content-type: image");
include('abredb.php');
include('qrlib.php'); 

if($_REQUEST)
{
	$RUT 	= $_REQUEST['rut'];
	$sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '$RUT'";
	$results = mysql_query( $sql ) or die('ok');
	
	if(mysql_num_rows(@$results) <= 0) // not available
	{

                                        echo '1';

	}
	else
	{         
                    
                    $linkqr ='http://dbcitometria.royalwebhosting.net/cursos/2019/validacion.php?rut='.$RUT;
                    // outputs image directly into browser, as PNG stream 
                    QRcode::png($linkqr);

	}
	
}

include('cierra_db.php');
?>



