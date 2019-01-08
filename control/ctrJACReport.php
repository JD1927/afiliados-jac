<?php
/** Incluye PHPExcel */
include("../Classes/PHPExcel.php");
include("../control/ctrConnection.php");
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Sandra Restrepo")
  ->setLastModifiedBy("Sandra Restrepo")
  ->setTitle("Reporte JAC Puerta del Sol")
  ->setSubject("Reporte JAC Puerta del Sol")
  ->setDescription("Reporte JAC Puerta del Sol")
  ->setKeywords("Reporte JAC Puerta del Sol")
  ->setCategory("Reporte JAC Puerta del Sol");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:L1');

$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('A1', 'REPORTE DE AFILIADOS')
  ->setCellValue('A2', 'ID')
  ->setCellValue('B2', 'TIPO IDENTIFICACION')
  ->setCellValue('C2', 'NOMBRE')
  ->setCellValue('D2', 'FECHA NACIMIENTO')
  ->setCellValue('E2', 'EDAD')
  ->setCellValue('F2', 'DIRECCION')
  ->setCellValue('G2', 'EMAIL')
  ->setCellValue('H2', 'GENERO')
  ->setCellValue('I2', 'EPS')
  ->setCellValue('J2', 'TIPO PERSONA')
  ->setCellValue('K2', 'COMITE')
  ->setCellValue('L2', 'NIVEL ACADEMICO');
			
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true, ), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->applyFromArray($boldArray);		

	
			
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);						

/*Extraer datos de MYSQL*/
  # conectare la base de datos
$bd = "afiliados_jac";
$oConnection = new ctrConnection();

$link = $oConnection->connect('localhost', $bd, 'jac', '8uCJHYLG7q3xjeSH');
  //--------------Se ejecuta Comando SQL-------------------------
$select = "SELECT 
P.IDENTIFICACION AS ID,
TI.DESCRIPCION AS TIPO_ID,
P.N_COMPLETO AS NOMBRE,
P.F_NACIMIENTO AS FECHA,
(SELECT TIMESTAMPDIFF(YEAR,P.F_NACIMIENTO,CURDATE())) AS EDAD,
P.DIRECCION,
P.EMAIL,
G.DESCRIPCION AS GENERO,
S.ENTIDAD AS SALUD,
TS.TIPO AS TSALUD,
C.DESCRIPCION AS COMITE,
NA.NIVEL AS NIVEL

FROM PERSONA P INNER JOIN TIPO_ID TI 
ON P.TIPO_ID = TI.CODIGO
INNER JOIN TIPO_PERSONA TP
ON P.COD_TPERSONA = TP.CODIGO
INNER JOIN GENERO G
ON P.COD_GENERO = G.CODIGO
INNER JOIN SALUD S 
ON P.COD_SALUD = S.CODIGO
INNER JOIN TIPO_SALUD TS
ON P.COD_TSALUD = TS.CODIGO
INNER JOIN COMITE C
ON P.COD_COMITE = C.CODIGO
INNER JOIN N_ACADEMICO NA
ON P.COD_NACADEMICO = NA.CODIGO
WHERE P.COD_TPERSONA = 1";

$recordSet = $oConnection->executeSQL($bd, $select);

$cel = 3;//Numero de fila donde empezara a crear  el reporte
while ($row = mysql_fetch_array($recordSet)) {
  $id = $row['ID'];
  $tipoId = $row['TIPO_ID'];
  $nombre = $row['NOMBRE'];
  $fecha = $row['FECHA'];
  $edad = $row['EDAD'];
  $direccion = $row['DIRECCION'];
  $email = $row['EMAIL'];
  $genero = $row['GENERO'];
  $salud = $row['SALUD'];
  $tsalud = $row['TSALUD'];
  $comite = $row['COMITE'];
  $nivel = $row['NIVEL'];


  $a = "A" . $cel;
  $b = "B" . $cel;
  $c = "C" . $cel;
  $d = "D" . $cel;
  $e = "E" . $cel;
  $f = "F" . $cel;
  $g = "G" . $cel;
  $h = "H" . $cel;
  $i = "I" . $cel;
  $j = "J" . $cel;
  $k = "K" . $cel;
  $l = "L" . $cel;
			// Agregar datos
  $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue($a, $id)
    ->setCellValue($b, $tipoId)
    ->setCellValue($c, $nombre)
    ->setCellValue($d, $fecha)
    ->setCellValue($e, $edad)
    ->setCellValue($f, $direccion)
    ->setCellValue($g, $email)
    ->setCellValue($h, $genero)
    ->setCellValue($i, $salud)
    ->setCellValue($j, $tsalud)
    ->setCellValue($k, $comite)
    ->setCellValue($l, $nivel);

  $cel += 1;
}

$oConnection->close($link);
/*Fin extracion de datos MYSQL*/
$rango = "A2:$l";
$styleArray = array(
  'font' => array('name' => 'Arial', 'size' => 10),
  'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Afiliados JAC Puerta del Sol');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Reporte_Afiliados_JAC_Puerta_del_Sol.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>