<?php
sleep(1);
include('abredb.php');
include('mem_image.php');
if($_REQUEST)
{
        $RUT    = $_REQUEST['rut'];
        $link = "http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion"; // enlace a la pagina de validacion del certificado
        $link2 = 'http://dbcitometria.royalwebhosting.net/cursos/2019/phpqrcode/genqr.php?rut='.$RUT; // Enlace para GENERAR QR dentro del servidor con php en el certificado 

    $sql = "select * from kbd9n_chronoforms_data_curso_2019 where rut = '$RUT' and Asiste_curso = 'SI'";
    
    $results = mysql_query( $sql ) or die('ok');
    
    if(mysql_num_rows(@$results) <= 0) // not available
    {
        echo'<script type="text/javascript">
                            alert("Alumno no encontrado en nuestra base de datos");
                            window.location.href="http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/certificado";
                     </script>';
    }
    else
    {
        while($row = mysql_fetch_array($results)) { 


                $image = "http://dbcitometria.royalwebhosting.net/cursos/2019/background.php";
                
                $pdf=new PDF_MemImage();
                $pdf->SetFont('Arial','',28);
                $pdf->SetProtection(array('print'));
                $pdf->AddPage('P','Letter');
                //$pdf->MemImage($image, -2, -2, 210 ,290);
                $pdf->Image($image, -2, -2, 210 ,290,'PNG');
                $pdf->Text(43,100,utf8_decode($row['nombre']." ".$row['A_Paterno']." ".$row['A_Materno']));
                $pdf->SetFont('Arial','B',14);
                $pdf->Text(43,122,utf8_decode('VII CURSO DE ACTUALIZACIÓN EN ONCOPATOLOGÍA'));
                if($row['Taller'] == NULL)  // not available
                             {
                $pdf->SetFont('Arial','',12);
                $pdf->Text(45,150,utf8_decode('Impartido por la Facultad de Medicina de la Universidad de Concepción,'));
                $pdf->Text(45,155,utf8_decode('el 02 al 03 de mayo de 2018, con una duración de 21 horas académicas.'));
                $pdf->Text(55,160,utf8_decode('Siendo Aprobado con calificación final de '.$row['Nota_Curso'].' (Escala de 1 a 7).'));
                $pdf->Text(90,165,utf8_decode('Concepción. Chile.'));
                $pdf->Text(15,225,utf8_decode('Certificado emitido por la Universidad de Concepción. La institución o'));
                $pdf->Text(15,230,utf8_decode('persona ante quien se presente este certificado, podrá verificar su '));
                $pdf->Text(15,235,utf8_decode('autenticidad por medio de su ID de alumno en la siguiente dirección:'));
                $pdf->SetFont('Arial','',8);
                $pdf->Text(15,240,utf8_decode('http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion'));
                $pdf->SetFont('Arial','',12);
                $pdf->Text(30,250,'ID Alumno: '.$row['rut']);
                $pdf->Image($link2,150,210,80,40,'PNG'); 
                $pdf->Output();
                exit;
                               }else{
                $pdf->Text(100,130,'Y');
                $pdf->Text(39,137,utf8_decode($row['Taller']));
                $pdf->SetFont('Arial','',12);
                $pdf->Text(45,150,utf8_decode('Impartido por la Facultad de Medicina de la Universidad de Concepción,'));
                $pdf->Text(45,155,utf8_decode('el 02 al 03 de mayo de 2018, con una duración de 21 horas académicas.'));
                $pdf->Text(55,160,utf8_decode('Siendo Aprobado con calificación final de '.$row['Nota_Curso'].' (Escala de 1 a 7).'));
                $pdf->Text(90,165,utf8_decode('Concepción. Chile.'));
                $pdf->Text(15,225,utf8_decode('Certificado emitido por la Universidad de Concepción. La institución o'));
                $pdf->Text(15,230,utf8_decode('persona ante quien se presente este certificado, podrá verificar su '));
                $pdf->Text(15,235,utf8_decode('autenticidad por medio de su ID de alumno en la siguiente dirección:'));
                $pdf->SetFont('Arial','',8);
                $pdf->Text(15,240,utf8_decode('http://dbcitometria.royalwebhosting.net/index.php/recursos/2019-01-28-19-11-19/curso-2019/validacion'));
                $pdf->SetFont('Arial','',12);
                $pdf->Text(30,250,'ID Alumno: '.$row['rut']);
                $pdf->Image($link2,150,210,80,40,'PNG'); 
                $pdf->Output();
                exit;
                               
                               }

      
                            }
    }
    
}
include('cierra_db.php');

?>

