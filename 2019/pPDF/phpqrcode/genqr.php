<?php
sleep(1);
header("Content-type: image");
include('abredb.php');
include('qrlib.php'); 

if($_REQUEST)
{
	$RUT 	= $_REQUEST['rut'];
	$sql = "select * from tabla_data_curso where rut = '$RUT'";
	$results = mysql_query( $sql ) or die('ok');
	
	if(mysql_num_rows(@$results) <= 0) // not available
	{

                                        echo '1';

	}
	else
	{         
                    
                    $linkqr ='validacion.php?rut='.$RUT;///// enlace de validacion del certificado
                    // salida como PNG stream del enlace de arriba
                    QRcode::png($linkqr);

	}
	
}

include('cierra_db.php');
?>



