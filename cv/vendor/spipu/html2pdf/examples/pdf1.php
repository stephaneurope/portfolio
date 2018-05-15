<?php

require_once 'C:\wamp64\www\cv\vendor\autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include dirname(__FILE__).'/res/pdf1.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('pdf1.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();


    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
