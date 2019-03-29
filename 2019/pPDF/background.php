<?php
sleep(1);

include('abredb.php');


	$sql = "select * from data_curso_2019 where id = '1'";  ////tabla alumnos  id curso
	$results = mysql_query( $sql ) or die('ok');
	
        while($row = mysql_fetch_array($results)) { 

///////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $data = $row['imagen'];  //// columna donde esta el blob con la imagen 
                       
                        $im = imagecreatefromstring($data);

                            header('Content-Type: image/png');
                            imagepng($im); // libera la imagen de fondo como png
                            imagedestroy($im);
                      
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
include('cierra_db.php');

?>
