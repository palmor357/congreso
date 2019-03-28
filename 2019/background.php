<?php
sleep(1);

include('abredb.php');


	$sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '17.145.594-4'";
	$results = mysql_query( $sql ) or die('ok');
	
        while($row = mysql_fetch_array($results)) { 

///////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $data = $row['imagen'];
                       
                        $im = imagecreatefromstring($data);

                            header('Content-Type: image/png');
                            imagepng($im);
                            imagedestroy($im);
                      
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
include('cierra_db.php');

?>
