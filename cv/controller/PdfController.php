<?php
namespace Controller;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

require "vendor/autoload.php"; 
class PdfController{
  
     public function pdf()
{

    try {
    ob_start();
    require APPLICATION_PATH.'/view/frontend/pdfcv.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
  
    
   
$html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->output('pdf.pdf');
    
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

}
}