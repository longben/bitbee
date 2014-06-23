<?php
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$this->PhpExcel = $objReader->load(APP.'Plugin'. DS . 'Ga' . DS . 'Config' . DS. 'excel'. DS ."department.xls");

// Set document properties
$this->PhpExcel->getProperties()->setCreator("Maarten Balliauw")
->setLastModifiedBy("Maarten Balliauw")
->setTitle("Office 2007 XLSX Test Document")
->setSubject("Office 2007 XLSX Test Document")
->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
->setKeywords("office 2007 openxml php")
->setCategory("Test result file");


// Add some data
$j = 0;
foreach($data as $i => $d){
    $j = $i + 2;
    $this->PhpExcel->setActiveSheetIndex(0)
        ->setCellValue('A' .$j, $d['Department']['id'])
        ->setCellValue('B' .$j, $d['Area']['name'])
        ->setCellValue('C' .$j, '民航通企字'. $d['GaDepartmentMeta']['licence'].'号')
        ->setCellValue('D' .$j, $d['Department']['name'])
        ->setCellValue('E' .$j, $this->controllers->findRegion($d['Department']['region_id']))
        ->setCellValue('F' .$j, $d['Department']['city_id'])
        ->setCellValue('G' .$j, $d['GaDepartmentMeta']['airport'])
        ->setCellValue('H' .$j, $d['Department']['dept_type_id'])
        ->setCellValue('I' .$j, $d['Department']['dept_attribute_id'])
        ->setCellValue('J' .$j, $d['GaDepartmentMeta']['registered_capital'])
        ->setCellValue('K' .$j, $d['GaDepartmentMeta']['corporation'])
        ->setCellValue('L' .$j, $d['GaDepartmentMeta']['scope'])
        ->setCellValue('M' .$j, $d['GaDepartmentMeta']['start_date'])
        ->setCellValue('N' .$j, $d['GaDepartmentMeta']['end_date'])
        ->setCellValue('O' .$j, $d['GaDepartmentMeta']['issuance_date'])
        ->setCellValue('P' .$j, $d['GaDepartmentMeta']['renewal_date'])
        ->setCellValue('Q' .$j, $d['Authority']['name'])
        ->setCellValue('R' .$j, $d['Department']['dept_character_id'])
        ->setCellValue('S' .$j, $d['GaDepartmentMeta']['status']);
}

// Rename worksheet
$this->PhpExcel->getActiveSheet()->setTitle('生产报表');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$this->PhpExcel->setActiveSheetIndex(0);

$objA1 = $this->PhpExcel->getActiveSheet()->getStyle('A1');
$this->PhpExcel->getActiveSheet()->duplicateStyle($objA1, 'A2:S'.$j);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="通用航空企业基础信息报表.xlsx"');
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
