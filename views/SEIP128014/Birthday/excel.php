<?php
include_once "../../../vendor/autoload.php";
/** Include PHPExcel */
include_once "../../../vendor/phpoffice/phpexcel/Classes/PHPExcel.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
$birthday = new Birthday();
$allData = $birthday->selectAll();

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'SL')
    ->setCellValue('B1', 'ID')
    ->setCellValue('C1', 'Name')
    ->setCellValue('D1', 'Email')
    ->setCellValue('E1', 'Description')
    ->setCellValue('F1', 'Birthday');

//fill the data
$sl = 0;
$counter = 1;
foreach ($allData as $data){
$sl++;
$counter++;
$newDate = date("d/m/Y", strtotime($data->bday));

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$counter, $sl)
    ->setCellValue('B'.$counter, $data->id)
    ->setCellValue('C'.$counter, $data->name)
    ->setCellValue('D'.$counter, $data->email)
    ->setCellValue('E'.$counter, $data->description)
    ->setCellValue('F'.$counter, $newDate);
}
// Miscellaneous glyphs, UTF-8

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="BirthdayList.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
