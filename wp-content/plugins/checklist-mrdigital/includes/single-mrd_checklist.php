<?php echo "new single";

require_once WPMRDC_PLUGIN_DIR . '/admin/sources/dompdf/autoload.inc.php';
// instantiate and use the dompdf class
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '

 <style>
 .donut-chart {
  position: relative;
  width: 200px;
  height: 200px;
  margin: 0 auto 2rem;
  border-radius: 100%

 }
 * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
p.center {
  background: #fff;
  position: absolute;
  text-align: center;
font-size: 28px;
  top:0;left:0;bottom:0;right:0;
  width: 130px;
  height: 130px;
  margin: auto;
  border-radius: 50%;
  line-height: 35px;
  padding: 15% 0 0;
}


.portion-block {
    border-radius: 50%;
    clip: rect(0px, 200px, 200px, 100px);
    height: 100%;
    position: absolute;
    width: 100%;
  }
.circle {
    border-radius: 50%;
    clip: rect(0px, 100px, 200px, 0px);
    height: 100%;
    position: absolute;
    width: 100%;
    font-family: monospace;
    font-size: 1.5rem;
  }


#part1 {
    transform: rotate(0deg);
  }

  #part1 .circle {
    background-color: #E64C65;
    /*transform: rotate(76deg);*/
    transform: rotate(100deg);
    }


#part2 {
    transform: rotate(100deg);
  }
#part2 .circle {
    background-color: #11A8AB;
    transform: rotate(150deg);
  }
#part3 {
    transform: rotate(250deg);
}
  #part3 .circle {
    background-color: #4FC4F6;
    transform: rotate(111deg);
  }

 #overlay {
    position: absolute;
    border-top:solid 5px rgb(172, 10, 25);
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background:url("'.ABSPATH.'/wp-content/uploads/2019/09/business-growth-main.png");
    background-position: center top;
    background-repeat: no-repeat;
    z-index: -1;
}
.SetAutoPageBreak{
  page-break-after: always;
}

 @page {
    size: A4;
    margin-top:0;
    margin-bottom:0;
    margin-left:0;
    margin-right:0;
    padding: 0;
  }
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.page:after { content: counter(page, decimal);}
</style>
<div id="overlay"></div>

<table>
  <tr>
    <th>Company '.ABSPATH .'</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
<p class="page">Page </p>
';
$html .= '<link rel="stylesheet" href="bootstrap.min.css">';
$html .= '<div class="SetAutoPageBreak"></div>';
 $html .= '<div id="overlay"></div>';
 $html .= '<p class="page">Page </p>';
 $html .= stripslashes($_POST["hidden_html"]);
 $file_name = md5(rand()) . '.pdf';
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
$canvas = $dompdf->get_canvas();
$canvas->page_text(830, 578, "Halaman: {PAGE_NUM} dari {PAGE_COUNT}", $font, 8, array(0, 0, 0));
// Render the HTML as PDF
$dompdf->render();
$file = $dompdf->output();
 file_put_contents($file_name, $file);
 $attachments = array( $file_name );
 $headers = 'From: My Name <gopu@mr-digital.co.uk>' . "\r\n";
 if(wp_mail( 'gopu@mr-digital.co.uk', 'report-from-website', 'pleasefindtheattachment', $headers, $attachments )){
   echo "success";
}

 ?>
 <?php get_header(); ?>

 <?php if (have_posts()) : the_post(); ?>
   <?php echo "success"; the_content(); ?>
 <?php endif; ?>


 <?php get_footer(); ?>
