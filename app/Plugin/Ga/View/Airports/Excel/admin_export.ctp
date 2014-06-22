<?php
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$this->PhpExcel = $objReader->load(APP.'Plugin'. DS . 'Ga' . DS . 'Config' . DS. 'excel'. DS ."airport.xls");

// Set document properties
$this->PhpExcel->getProperties()->setCreator("GA")
->setLastModifiedBy("GA")
->setTitle("Title")
->setSubject("Subject")
->setDescription("通用航空机场信息报表")
->setKeywords("office 2007 openxml")
->setCategory("报表");

// Add some data

foreach($data as $i => $d){
    $j = $i + 2;

    $this->PhpExcel->setActiveSheetIndex(0)
        ->setCellValue('A' .$j, $d['Airport']['id'])
        ->setCellValue('B' .$j, $d['Airport']['name'])
        ->setCellValue('C' .$j, $d['Area']['name'])
        ->setCellValue('D' .$j, $d['Airport']['active_time'])
        ->setCellValue('E' .$j, $this->requestAction('/ga/airports/getInvestor/'.$d['Airport']['investor']))
        ->setCellValue('F' .$j, $d['Airport']['airport_type']==1?'永久机场':'临时机场')
        ->setCellValue('G' .$j, $this->requestAction('/ga/airports/getGrade/'.$d['Airport']['grade']))
        ->setCellValue('H' .$j, $d['Airport']['elevation'])
        ->setCellValue('I' .$j,$d['Airport']['runway_spec'])
        ->setCellValue('J' .$j, $d['Airport']['parking_spec'])
        ->setCellValue('K' .$j, $d['Airport']['runway_heading'])
        ->setCellValue('L' .$j, $d['Airport']['obstacle_clearance'])
        ->setCellValue('M' .$j, $d['Airport']['position'])
        ->setCellValue('N' .$j, $d['Airport']['alternate_airport'])
        ->setCellValue('O' .$j, $d['Airport']['distance'])
        ->setCellValue('P' .$j, $d['Airport']['telphone']);
}

// Rename worksheet
$this->PhpExcel->getActiveSheet()->setTitle('生产报表');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$this->PhpExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="通用航空机场信息报表.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($this->PhpExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
