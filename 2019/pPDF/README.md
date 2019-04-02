# Libreria pPDF (la p es por mi nickname, palmor :P)

con esta libreria programada en PHP, se puede usar para llamar un certificado, agregando proteccion contra modificacion utilizando las librerias de fPDF y tambien genera un codigo qr hacia un sistema de validacion mediado con una base de datos hecha en mySQL

# Pre Requisitos
Funciona en conjunto con una base de datos en  mySQL 5.7, y PHP 5.6.40	 

# Caracteristicas
Codigo fue programado en PHP 
Utilizando las Librerias de FPDF, FPDF_Protection (Klemen VODOPIVEC), Memory image support (Olivier), phpqrcode (Kentaro Fukuchi.), lo que permite: 

- Crear un PDF, llamando el background según el correspondiente curso desde un campo BLOB de la base de datos
- Crear un código QR con la información necesaria para validar el certificado digital
- Dar protección al documento contra modificación, copia y escritura.
- Traer los datos de los participantes por medio del rut.

# Instalación

debem modificarlos los archivos abre_db.php, background.php, validacion.php /phpqrcode/genqr.php, y certifica2.php según corresponda basados en los datos de su base de datos.

# Licencia

Copyleft (C) 2019 por Cristopher Palma.

Esta biblioteca es software libre; puedes redistribuirlo y / o modificarlo bajo
Los términos de la Licencia Pública General Menor de GNU publicados por Free
Fundación de Software; ya sea la versión 3 de la Licencia, o cualquier versión posterior.

# Uso

                $pdf=new PDF_pPDF();
                $pdf->SetFont('Arial','',28);
                $pdf->SetProtection(array('print'));  // Añadir Passsword al documento funcion SetProtection( array $permissions ('copy''print''modify''annot-forms') [, string $user_password [, string $owner_password [, integer $length ]]]) 
                $pdf->AddPage('P','Letter'); //P Portrait, L Landscape
                $pdf->Image($URL imagen, -2, -2, 210 ,290,'PNG');
                $pdf->Text(43,100,utf8_decode('String, o lo que se desee escribir'));
                $pdf->Output('','certificado.pdf'); //

Más información de los comandos en: http://www.fpdf.org/en/doc/

# Contacto:

Nombre: Cristopher Palma. mail: palmor357@gmail.com
