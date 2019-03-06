<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author preetish Priyabrata
 * @since 2016-07-07
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->Output('uploads/attend/preetishfileslpmssss.pdf', 'D');