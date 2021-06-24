<?php
require_once APPPATH."libraries/PhpSpreadsheet/vendor/autoload.php";

//use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class Excel {

//    public $CI;
//    public $instance ;
//    private $reader;
//    private $writer;
    public function __construct()
    {
//        $this->CI = & get_instance();
//        $this->instance = new Spreadsheet();
    }

//    public function identify($inputFileName)
//    {
//        return \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
//    }

//    public function createReader($inputFileType)
//    {
//        $this->reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
//    }
    
    public function createWrite($writeType)
    {
//      $this->writer = IOFactory::createWriter($this->instance, $writeType);
    }
    
    public function write($file_name, $header, $title, $subject, $desc, $data)
    {
//      $helper = new Sample();
//      if ($helper->isCli()) {
//        $helper->log('This example should only be run from a Web Browser' . PHP_EOL);
//
//        return false;
//      }
      
      if (!is_array($data) || !is_array($header)) {
        return false;
      }

      // Create new Spreadsheet object
      $spreadsheet = new Spreadsheet();
  
      // Set document properties
      $spreadsheet->getProperties()->setCreator('FOUNDY')
        ->setLastModifiedBy('FOUNDY')
        ->setTitle($title)
        ->setSubject($subject)
        ->setDescription($desc);
        //->setKeywords('office 2007 openxml php')
        //->setCategory('Test result file');

      // set header
      for ($i = 0; $i < count($header); $i++) {
        log_message('debug', '[master] header'.$i.'[' . $header[$i] . ']');
        $spreadsheet->setActiveSheetIndex(0)
          ->setCellValueExplicitByColumnAndRow($i + 1, 1, $header[$i], DataType::TYPE_STRING);
      }
  
      // Add some data
      $row_idx = 2;
      for ($i = 0; $i < count($data); $i++) {
        $row = $data[$i];
        $col_idx = 1;
        foreach ($row as $key => $value) {
          $spreadsheet->setActiveSheetIndex(0)
            ->setCellValueExplicitByColumnAndRow($col_idx, $row_idx, $value, DataType::TYPE_STRING);
          $col_idx++;
        }
        $row_idx++;
      }
      
      // Rename worksheet
      $spreadsheet->getActiveSheet()->setTitle($title);

      // Set active sheet index to the first sheet, so Excel opens this as the first sheet
      $spreadsheet->setActiveSheetIndex(0);

      // Redirect output to a client’s web browser (Xlsx)
      //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      //header('Content-Disposition: attachment;filename="01simple.xlsx"');
      //header('Cache-Control: max-age=0');

      // If you're serving to IE 9, then the following may be needed
      //header('Cache-Control: max-age=1');

      // If you're serving to IE over SSL, then the following may be needed
      //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      //header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      //header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      //header('Pragma: public'); // HTTP/1.0
  
      header("Content-Description: File Transfer");
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment;filename=\"{$file_name}.xlsx\"");
      
      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
  
      return true;
    }
   
    /*
    public function write2($data) {
      // file name
      $filename = 'users_'.date('Ymd').'.csv';
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=$filename");
      header("Content-Type: application/csv; ");
      // get data
      // file creation
      $file = fopen('php://output','w');
      $header = array("Username","Name","Gender","Email");
      fputcsv($file, $header);
      foreach ($data as $key=>$line){
        fputcsv($file,$line);
      }
      fclose($file);
      exit;
    }
    */
  
}














?>