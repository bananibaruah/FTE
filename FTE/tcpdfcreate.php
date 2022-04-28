<?php

require_once("TCPDF/tcpdf.php");
$ctc = $_POST["ctc"];
$basic = $_POST["basic"];
$hra = $_POST["hra"];
$Statutory_Bonus = $_POST['Statutory_Bonus'];
$Conveyance_Allowance = $_POST['Conveyance_Allowance'];
$Total_A = $_POST['Total_A'];
$PF = $_POST['PF'];
$Total_B = $_POST['Total_B'];
$TOTAL = $_POST['TOTAL'];
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setFontSubsetting(true);
$pdf->SetFont('Helvetica', '', 9.5);
$pdf->SetMargins(10, 10, 10, true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 35);
// $toolcopy = ' my content <br>';

// $toolcopy .= '<img src="header.png"  width="500" height="50">';
// $toolcopy .= '<br> other content';


// $html .= "<strong>November 25, 2021</strong>" . "<br> <strong>NSEIT/HR/OL/CCS/06557</strong>" . "<br>";
$html .= "<b>Your CTC : </b>" . $ctc . " <br> BASIC : " . $basic . " <br> HRA : " . $hra . " <br> Statutory_Bonus : " . $Statutory_Bonus . " <br> Conveyance_Allowance : " . $Conveyance_Allowance . " <br> Total_A : " . $Total_A . " <br> PF : " . $PF . " <br> Total_B : " . $Total_B . " <br> TOTAL: " . $TOTAL;
$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();


//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once("TCPDF/tcpdf.php");


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = "header.png";
        $this->Image($image_file, 10, 10, 150, '', 'png', '', 'T', false, 500, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
    // Title
    // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = "nehaaaaaaaaaaaaaaaaaaaa";

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('index.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
// $pdf->Output('index.pdf');



?>