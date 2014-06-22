<?php
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$this->PhpExcel = $objReader->load(APP.'Plugin'. DS . 'Ga' . DS . 'Config' . DS. 'excel'. DS ."aircraft.xls");

// Set document properties
$this->PhpExcel->getProperties()->setCreator("GA")
->setLastModifiedBy("GA")
->setTitle("Title")
->setSubject("Subject")
->setDescription("通用航空器信息报表")
->setKeywords("office 2007 openxml")
->setCategory("报表");

// Add some data

foreach($data as $i => $d){
    $j = $i + 2;

    $this->PhpExcel->setActiveSheetIndex(0)
        ->setCellValue('A' .$j, $d['Corp']['id'])
        ->setCellValue('B' .$j, $this->requestAction('/ga/ga_departments/getName/'.$d['Corp']['department_id']))
        ->setCellValue('C' .$j, $this->requestAction('/ga/ga_departments/getName/'.$d['Corp']['area_id']))
        ->setCellValue('D' .$j, $d['Corp']['registration_no'])
        ->setCellValue('E' .$j, $d['Corp']['registration_flag'])
        ->setCellValue('F' .$j, $this->requestAction('/codes/getName/'.$d['Aircraft']['type']))
        ->setCellValue('G' .$j, $this->requestAction('/codes/getName/'.$d['Aircraft']['brand']))
        ->setCellValue('H' .$j, $this->requestAction('/codes/getName/'.$d['Aircraft']['model']))
        ->setCellValue('I' .$j, $this->requestAction('/codes/getNameSet/'.$d['Corp']['purpose']))
        ->setCellValue('J' .$j, $d['Aircraft']['oil_type']==1?'航空煤油':'航空汽油')
        ->setCellValue('K' .$j, $d['Aircraft']['netweight'])
        ->setCellValue('L' .$j, $d['Aircraft']['max_load'])
        ->setCellValue('M' .$j, $d['Aircraft']['kts'])
        ->setCellValue('N' .$j, $d['Aircraft']['maximum_range'])
        ->setCellValue('O' .$j, $d['Aircraft']['passenger_capacity'])
        ->setCellValue('P' .$j, $d['Corp']['register_date'])
        ->setCellValue('Q' .$j, $d['Corp']['age'])
        ->setCellValue('R' .$j, $this->requestAction('/ga/aircrafts/getProcureMethod/'.$d['Corp']['procure_method']))
        ->setCellValue('S' .$j, $d['Corp']['procure_date'])
        ->setCellValue('T' .$j, $this->requestAction('/ga/aircrafts/getStatus/'.$d['Corp']['status']))
        ->setCellValue('U' .$j, $this->requestAction('/ga/aircrafts/getMaintenance/'.$d['Corp']['maintenance']));
}

// Rename worksheet
$this->PhpExcel->getActiveSheet()->setTitle('生产报表');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$this->PhpExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="通用航空器信息报表.xlsx"');
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
