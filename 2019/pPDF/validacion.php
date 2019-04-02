<?php
sleep(1);
include('abredb.php');
if($_REQUEST)
{
	$link = "http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion"; // Link goes here!
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
                            <base href='http://www.econtinuamed.cl/'>
                            <link href='http://www.econtinuamed.cl/assets/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='http://www.econtinuamed.cl/assets/css/base.css' rel='stylesheet'>
                                <link href='http://www.econtinuamed.cl/assets/css/style.css' rel='stylesheet'>
                                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

                        </head>
                        <body>

                            <!-- Barra contacto educamed  -->

                           <div class='topbar bg-theme'>
                                <div class='container'>
                                        <div class='col-md-8'>
                                        <div class='row'>
                                            <ul class='topbar-info list-inline is-hidden-xs t-xs-center t-md-left'>
                                            <li> <a href='http://www.econtinuamed.cl'><img src='http://www.econtinuamed.cl/assets/images/logo.png' alt='' width='130' height='50' ></a></li>
                                                <li class='prl-10'><i class='fa fa-map-marker mr-10 font-16'></i>Chacabuco Esquina Janequeo S/N</li>
                                                <li class='prl-10'>
                                                    <i class='fa fa-phone mr-10 font-16'></i>+56 (41) 2204483 </li>
                                                <li class='prl-10'>
                                                    <i class='fa fa-envelope mr-10 font-16'></i>educamed@udec.cl</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                             <!--  FIN  Barra contacto educamed  -->

                        <section class='section services-area ptb-60'>
              <div class='container'>
                    <div class='row mb-30'>
                        <div class='col-lg-7 col-md-8 col-sm-10 col-xs-12 col-xs-left t-left mb-40'>
                
                            <h2 class='section-title mb-20 font-22 t-uppercase'>Verificación Certificado</h2>
                            <h5>SÓLO ALUMNOS ASISTENTES AL CURSO DE ONCOPATOLOGÍA 2019.</h5> 
                            <div class='heart-line'>
              
                            </div>
                        </div>
                    </div>
                  <div class='row'>
                      <div class='col-md-4'>
                            <div class='service-single'>
                              <div class='service-content'>
                                    <h5 class='mb-10 t-uppercase color-theme'>Estado del certificado</h5>
                                <fieldset>
                                            <dl>
                                                <dt>Fecha Emisión:</dt>
                                                <dd>10-04-2019</dd>
                                                <dt>Válido Hasta:</dt>
                                                <dd>No Caduca</dd>
                                            </dl>
                                    </fieldset>
                                </div>
                            </div>
                    </div>                                         
                  </div>
                    <div class='row'>
                      <div class='col-md-4'>
                        <div class='service-single'>
                          <div class='service-content'>
                            <h5 class='mb-10 t-uppercase color-theme'>Datos del certificado</h5>
                             <fieldset>
                                    <p>A continuación se muestran información del certificado.</p>
                                    <dl>
                                        <dt>Rut:</dt>
                                        <dd>  $RUT</dd>
                                        <dt>Nombre:</dt>
                                        <dd>  ".$row['nombre']." ".$row['A_Paterno']." ".$row['A_Materno']."</dd>
                                        <dt>Taller:</dt>
                                        <dd>  ".$row['Taller']."</dd>
                                        <dt>Calificación:</dt>
                                        <dd>  Aprobado Nota: ".$row['Nota_Curso']."</dd>
                                </fieldset>
                                   <a class='btn btn-o btn-sm btn-rounded' href=\"$link\">Volver</a>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </section>   
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- SCRIPTS                                   -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- (!) Placed at the end of the document so the pages load faster -->
    <!-- =========[ jQuery library ]========= -->
    <script src='http://www.econtinuamed.cl/assets/js/jquery-1.12.3.min.js'></script>
    <!-- ========[ Latest Bootstrap ]======== -->
    <script type='text/javascript' src='http://www.econtinuamed.cl/assets/js/bootstrap.min.js'></script>
                        </body>
                              <footer class='main-footer pt-60'>
            <div class='container'>
                <div class='footer-widgets'> </div>
                </div>
            </div>
            <div class='sub-footer'>
                <div class='container'>
                    <h6 class='copyright'> Unidad de Educación continua 2019 | Facultad de Medicina | Universidad de Concepción</h6>
              </div>
</div>
        </footer>
        <!-- –––––––––––––––[ END FOOTER ]––––––––––– -->
                        </html>
                        ";
							}
	}
	
}
include('cierra_db.php');

?>
