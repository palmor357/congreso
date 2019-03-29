<?php
sleep(1);
include('abredb.php');
if($_REQUEST)
{
	$link = "http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion"; // Link para volver a la página de validacion
        $RUT 	= $_REQUEST['rut'];
	$sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '$RUT' and Asiste_curso = 'SI'";  /// consulta rut y si asiste curso
	$results = mysql_query( $sql ) or die('ok');
	
	if(mysql_num_rows(@$results) <= 0) // si no arroja resultados
	{
		echo'<script type="text/javascript">
                            alert("Alumno no encontrado en nuestra base de datos");
                            window.location.href="http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion";
                     </script>';
	}
	else  /// en caso de que de una coincidencia
	{
		while($row = mysql_fetch_array($results)) {	
		
		echo "
                        <html>
                        <body>
                        <div id='contenido' class='clearfix'>
                                    <div>
                                        <p>A continuación se muestra la información del certificado consultado.</p>
                                    </div>
                                    <div>
                                        <h3>SÓLO ALUMNOS ASISTENTES AL CURSO DE ONCOPATOLOGÍA 2019</h3>
                                    </div>
                                    <fieldset>
                                        <h3>Estado del certificado</h3>
                                        <div>
                                            <dl>
                                                <dt>Fecha Emisión:</dt>
                                                <dd>10-04-2019</dd>
                                                <dt>Válido Hasta:</dt>
                                                <dd>No Caduca</dd>
                                            </dl>
                                    </fieldset>
                                </div>
                                
                                
                                <h2>Verificación Certificado</h2>
                                
                                <fieldset>
                                    <h3>Datos del certificado</h3>
                                    <p>A continuación se muestran información del certificado.</p>
                                    <dl>
                                        <dt>Rut:</dt>
                                        <dd>$RUT</dd>
                                        <dt>Nombre</dt>
                                        <dd>".$row['nombre']." ".$row['A_Paterno']." ".$row['A_Materno']."</dd>
                                        <dt>Taller:</dt>
                                        <dd>".$row['Taller']."</dd>
                                        <dt>Calificación</dt>
                                        <dd>Aprobado Nota: ".$row['Nota_Curso']."</dd>
                                </fieldset>

                        </div>
                        </body>
                        </html>
                        ";
                                echo "<a href=\"$link\">Volver</a>";
							}
	}
	
}
include('cierra_db.php');

?>
