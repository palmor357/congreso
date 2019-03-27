<?php
sleep(1);
include('abredb.php');
if($_REQUEST)
{
	$link = "http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion"; // Link goes here!
        $link2 = "http://dbcitometria.royalwebhosting.net/cursos/2019/validacion.php?rut="; // Link goes here!
        $Nombbre = $_GET['nombre'];
        $A_Paterno = $_GET['A_Paterno'];
        $A_Materno = $_GET['A_Materno'];
        $Taller = $_GET['Taller'];
        $Nota = $_GET['Nota_Curso'];
        $RUT 	= $_REQUEST['rut'];
	$sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '$RUT' and Asiste_curso = 'SI'";
	$results = mysql_query( $sql ) or die('ok');
	
	if(mysql_num_rows(@$results) <= 0) // not available
	{
		echo'<script type="text/javascript">
                            alert("Alumno no encontrado en nuestra base de datos");
                            window.location.href="http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion";
                     </script>';
	}
	else
	{
		while($row = mysql_fetch_array($results)) {	
            echo "
            <html>
            <head>
            <script src='http://dbcitometria.royalwebhosting.net/html2canvas.js' type='text/javascript'></script>
                <script src='http://dbcitometria.royalwebhosting.net/jspdf.min.js' type='text/javascript'></script>
                <script src='http://dbcitometria.royalwebhosting.net/jquery-1.3.2.js' type='text/javascript'></script>
                <script src='http://dbcitometria.royalwebhosting.net/jquery-qrcode-0.15.0.js' type='text/javascript'></script>
                <script src='http://dbcitometria.royalwebhosting.net/jquery-qrcode-0.15.0.min.js' type='text/javascript'></script>
<script type='text/javascript'>
                        var dom = \"".$row['rut']."\";
			var nombre = 'cerCurso';
			var taller = \"".$row['Taller']."\";
                    	var validacionscr = \'".$link2.$row['rut']."\';
		$(document).ready(function() {
                $('#codigovalidacion').qrcode({
							render: 'div',
							ecLevel: 'L',
							width: 200,
							height: 200,
							fill: '#000',
							text: validacionscr
						}); //generar el qr
                                        }); 
               $(document).ready(function() {   
                                               html2canvas(document.body, {
							onrendered: function(canvas) {
								var img = canvas.toDataURL('image/png');
								var doc = new jsPDF('portrait');
								doc.addImage(img, 'JPEG', 0, 0, 255, 297);
								doc.save('certificado_curso.pdf');
							}
						});
                       });
                $(document).ready(function() { 
                if (taller == 'No') {
				document.getElementById('divtaller').style.display = 'none';
			} else {
				document.getElementById('divtaller').style.display = 'block';
			};
                 });
	</script>
            
            </head>
            <body>
                <div id=\"cerCurso\" style='background-image: url('http://dbcitometria.royalwebhosting.net/images/old/imgcurso/2019/cer2019.png'); height: 1632px; width: 1282px; border: 1px solid black; display: none;'>
                    <div style=\"width: 1282px; margin: 530px 0 0 0px; text-align: center; font-family: 'Palace Script MT'; font-size: 50pt;\">".$row['nombre']." ".$row['A_Paterno']." ".$row['A_Materno']."</div>
                    <div style=\"width: 1282px; margin: 100px 0 0 0px; text-align: center; font-family: 'Arial'; font-size: 20pt;\"><strong>VII CURSO DE ACTUALIZACIÓN EN ONCOPATOLOGÍA</strong>
                    </div>
                    <div style=\"width: 1282px; height: 100px; margin: 30px 0 0 0px; text-align: center; font-family: 'Arial'; font-size: 20pt;\">
                        <div id=\"taller\" style=\"display: none;\"><strong>Y <br /><br />".$row['Taller']."</strong>
                        </div>
                    </div>
                    <div style=\"width: 1282px; margin: 20px 0 0 0px; text-align: center; font-family: 'Arial'; font-size: 14pt;\"><strong>Impartido por la Facultad de Medicina de la Universidad de Concepción,<br />el 02 al 03 de mayo de 2018, con una duración de 21 horas académicas.<br />Siendo Aprobado con calificación final de ".$row['Nota_Curso']." (Escala de 1 a 7).<br />Concepción. Chile.</strong>
                    </div>
                    <div style=\"width: 350px; margin: 310px 0 0 1000px; text-align: rigth; font-family: 'Arial'; font-size: 14pt;\"><div id='codigovalidacion'></div></div>
                    <div style=\"width: 1282px; margin: 150px 0 0 290px; text-align: Left; font-family: 'Arial'; font-size: 14pt;\">".$row['rut']."</div>
                </div>
                </body>
                </html>";
                                echo "<a href=\"$link\">Volver</a>";
							}
	}
	
}
include('cierra_db.php');

?>