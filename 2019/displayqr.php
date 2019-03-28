<?php
// include QR_BarCode class
sleep(1);
header("Content-type: image");
include('abredb.php');
include('QR_BarCode.php');
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
                 // QR_BarCode object 
                        $qr = new QR_BarCode(); 
                        
                        // create text QR code 
                        $qr->url('http://dbcitometria.royalwebhosting.net/cursos/2019/validacion.php?rut='.$RUT);
                        
                        // display QR code image
                       echo $qr->qrCode();
                      // $qr->qrCode(350,'images/cw-qr.png');
	}
	
}

include('cierra_db.php');
?>
