<?php

//pdf.php

require_once plugin_dir_path( __FILE__ ) . 'admin/sources/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

 public function __construct(){
  parent::__construct();
 }
}

?>
