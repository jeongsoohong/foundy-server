<?php
require_once APPPATH."libraries/PhpSpreadsheet/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

class Spreadsheet {

    public $CI;
    public $instance;
    public function __construct()
    {
        $CI = & get_instance();
        $instance = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    }

    public function identify($inputFileName)
    {
        return \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
    }

    public function createReader($inputFileType)
    {
        return \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    }
    
    public function createWrite($spreadsheet, $write_type)
    {
      //return \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($inputFileType);
    }
  
}














?>