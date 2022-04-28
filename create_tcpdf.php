<?php

require_once("TCPDF/tcpdf.php");
$name = $_POST["name"];
$Sd = $_POST["Sd"];
$ed = $_POST["ed"];
$doj = $_POST["doj"];
$Ad1 = $_POST["Ad1"];
$Ad2 = $_POST["Ad2"];
$Ad3 = $_POST["Ad3"];
$Position = $_POST["Position"];
$Pincode = $_POST["Pincode"];
$City = $_POST["City"];
$state = $_POST["state"];
$grade = $_POST["grade"];
$ctc = $_POST["ctc"];
$basic = $_POST["basic"];
$hra = $_POST["hra"];
$basic1 = round($basic / 12);
$hra1 = round($hra / 12);
$Statutory_Bonus = $_POST['Statutory_Bonus'];
$Statutory_Bonus1 = round($Statutory_Bonus / 12);
$Conveyance_Allowance = $_POST['Conveyance_Allowance'];
$Conveyance_Allowance1 = round($Conveyance_Allowance / 12);
$Executive_Allowance = $_POST['Executive_Allowance'];
$Executive_Allowance1 = round($Executive_Allowance / 12);
$Total_A = $_POST['Total_A'];
$Total_A1 = round($Total_A / 12);
$PF = $_POST['PF'];
$PF1 = round($PF / 12);
$Total_B = $_POST['Total_B'];
$Total_B1 = round($Total_B / 12);
$TOTAL = $_POST['TOTAL'];
$TOTAL1 = round($TOTAL / 12);
$Code = $_POST['Code'];
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setFontSubsetting(true);
$pdf->SetFont('times', '', 10.8);
$pdf->SetMargins(10, 10, 15, true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 30);


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = 'header.png';
        $this->Image($image_file, 30, 10, 150, '', 'png', '', 'T', false, 200, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('times', '', 10.8);
        // Title
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        $image_file = 'footer.png';
        $this->Image($image_file, 10, 270, 190, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font        // Title
        $this->Cell(0, -15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', '', 10.8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    public function Signature()
    {
        $image_file = 'Sig.png';
        $this->Image($image_file, 10, 350, 190, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font        // Title
        $this->Cell(0, -15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', '', 10.8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('OFFER LETTER');
$pdf->SetSubject('OFFER LETTER');
$pdf->SetKeywords('TCPDF, PDF');

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
$pdf->SetFont('times', '', 10.5);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$html .= <<<EOD
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>OFFER LETTER </b>

<b>
<br><br>$Sd
<h3>$Code</h3><br><br>
$name <br>
$Ad1 ,<br>
$Ad2 ,<br><br>
$City  $Pincode <br>
$state <br><br>

Dear $name , <br><br>
</b>
We are pleased to offer you employment in our organization NSEIT ltd as <b>'$Position'</b> for a fixed period of employment (Contract) on the following terms and conditions.<br><br>
The term of your employment shall be valid from <b>$Sd to $ed</b> . Notwithstanding this, in the event of the project/work for which you are being employed terminates before the aforementioned period, this contract shall be co terminus with the project/work. <br><br>
Details of your salary break up with components are as per the Annexure I attached herewith.<br><br>
This contract shall be terminable by either party giving 30 days notice in writing or salary in lieu of notice to the other party.<br><br>       																							         
In addition to the terms of appointment mentioned in this letter you are also governed by the terms and conditions of the company, which are attached to this letter. The combined rules and procedures as contained in this letter and the annexure will constitute the employment rules and you are required to read both of them in conjunction.	<br><br>								                                                                                                                                                                                       As a token of your understanding and acceptance of the terms and conditions you are requested to sign the duplicate copy of this letter and return it within a day, failing which this offer stands withdrawn. 
You are required to report for duty on <b>$doj</b> not later than <b>9.30 a.m</b>.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>
Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.<br><br>
Wishing you the very best for your assignment with us.<br><br>
Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>
Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br><br>
<P style="page-break-before: always">
EOD;

$html .= <<<EOD
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<b>OFFER LETTER OFFICE COPY</b>

<b>
<br><br><Dear>$Sd
<h3>$Code</h3><br><br>
$name <br>
$Ad1 ,<br>
$Ad2 ,<br><br>
$City  $Pincode <br>
$state <br><br>

Dear $name , <br><br>
</b>
We are pleased to offer you employment in our organization NSEIT ltd as <b>“$Position”</b> for a fixed period of employment (Contract) on the following terms and conditions.<br><br>
The term of your employment shall be valid from <b>$Sd to $ed</b> . Notwithstanding this, in the event of the project/work for which you are being employed terminates before the aforementioned period, this contract shall be co terminus with the project/work. <br><br>
Details of your salary break up with components are as per the Annexure I attached herewith.<br><br>
This contract shall be terminable by either party giving 30 days notice in writing or salary in lieu of notice to the other party.<br><br>       																							         
In addition to the terms of appointment mentioned in this letter you are also governed by the terms and conditions of the company, which are attached to this letter. The combined rules and procedures as contained in this letter and the annexure will constitute the employment rules and you are required to read both of them in conjunction.	<br><br>								                                                                                                                                                                                       As a token of your understanding and acceptance of the terms and conditions you are requested to sign the duplicate copy of this letter and return it within a day, failing which this offer stands withdrawn. 
You are required to report for duty on <b>$doj</b> not later than <b>9.30 a.m</b>.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>
Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.<br><br>
Wishing you the very best for your assignment with us.<br><br>

Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>



Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br>
<b><u><i>Signature & Date  </i></u></b>
<P style="page-break-before: always">
EOD;

$html .= <<<EOD
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>OFFER DETAILS</b><br>


<br>$name<br><br><br>
<b>1.	Term of employment:</b><br><br>
You are on a fixed term employment from <b>$Sd to $ed</b>.<br><br>

Your working days will be <b>Monday to Friday</b>.<br><br>

<b>2.	Probation:</b><br><br>
You will be on probation for a period of 3 months from your date of joining.<br><br>

<b>3.	Remuneration:</b><br><br>
Your salary and allowances will be as per the details attached to this letter and marked as Annexure I. <br><br>

<b>4.	Medical Fitness:</b><br><br>
Your appointment will be subject to your being found medically fit for service in the Company and furnishing a duly stamped and signed letter by a registered medical practitioner as a memorandum thereof.<br><br>

<b>5.	Submission of Documents:</b><br><br>
Your appointment is been made on the basis of the particulars such as qualification, experience etc. as given in your application. If any statement, documentation, declaration or information given by you at any time, is found to be fraudulent / false or if any material / particular is suppressed / misinformed, your services are liable to be terminated forthwith without any notice or compensation in lieu thereof.<br>
Your appointment will be subject to your furnishing such information as the Company may require from time to time and subject to your services being acceptable in the light of the information furnished.<br><br>

<b>6.	Background Verification:</b><br><br>
The Company reserves the right to carry out reference verifications or background checks (not restricted to the last salary drawn, past employment, use of banned / illegal drugs / narcotic substances, criminal records etc.) prior to your joining the Company or during the course of your employment with the Company. You understand and acknowledge that this is a requirement and you have no objections whatsoever if such checks are carried out by the company or a third party agency engaged by the company.<br><br>
<br><br><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b><u>Initials</u></b>

<br><br><br><br><br><br><br>
EOD;


$html .= <<<EOD
<br><br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>ANNEXURE-I</b><br>


$name<br>
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b><u>COMPENSATION DETAILS</u></b><br><br>
<br><br>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray width:100% height:100%;">
   <tr style="background-color:white;color:black;">
        <td><b>FTE Name</b></td>
        <td><b>$name</b></td>
        <td><b>Location</b></td>
		<td><b>$Ad3</b></td>
    </tr>
    <tr>
        <td><b>Designation</b></td>
        <td><b>$Position</b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
	<tr>
        <td><b>wef</b></td>
        <td><b>$Sd</b></td>
		<td><b>Grade</b></td>
		<td><b>$grade</b></td>
    </tr>
	<tr>
        <td><b></b></td>
        <td><b>Compensation Head</b></td>
		<td><b>Monthly</b></td>
		<td><b>Annual</b></td>
    </tr>
    <tr>
        <td><b>Part I</b></td>
        <td><b>Fixed Components</b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b>A</b></td>
        <td><b>Salary</b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>Basic</td>
		<td>$basic1</td>
		<td>$basic</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>HRA</td>
        <td>$hra1</td>
        <td>$hra</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>Conveyance Allowance</td>
		<td>$Conveyance_Allowance1</td>
		<td>$Conveyance_Allowance</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>Statutory Bonus</td>
		<td>$Statutory_Bonus1</td>
		<td>$Statutory_Bonus</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>Executive Allowance</td>
		<td>$Executive_Allowance1</td>
		<td>$Executive_Allowance</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>Total A</b></td>
		<td><b>$Total_A1</b></td>
		<td><b>$Total_A</b></td>
    </tr>
    <tr>
        <td><b>B</b></td>
        <td><b> Retirals / Other Benefits </b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>Employer Contribution to Provident Fund </td>
		<td>$PF1</td>
		<td>$PF</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>Total B</b></td>
		<td><b>$Total_B1</b></td>
		<td><b>$Total_B</b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>Total of PART I (A+B)</b>  </td>
		<td><b>$TOTAL1</b></td>
		<td><b>$TOTAL</b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b> Cost to Company PART I (A + B)</b>  </td>
		<td><b>$TOTAL1</b></td>
		<td><b>$TOTAL</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>Please note: </b></td>
    </tr>
    <tr>
        <td colspan="4">
        Please note:<br>
        The company provides the following benefits for their FTE's, the premium for which is directly paid by the company:<br>
        * Personal Accident Policy for the FTE's.<br>
        * Incase of any amendment in compliance law, the company reserves right to restructure the salary components keeping the CTC  intact adhering to compliance<br>
        </td>
        
    </tr>
</table>
<P style="page-break-before: always"><br>
EOD;

$html .= <<<EOD
<br><br><br><br><br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>ANNEXURE II</b><br>


<br>$name<br>

&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; 
<b><u>LIST OF DOCUMENTS</u></b><br><br><br>

<b>You are required to submit the following documents* on the day you join the Company:</b><br><br>

1.	<u>Experience Certificate :</u><br><br>
    Relieving letter / Resignation Acceptance Letter from immediate previous employer.<br><br>
    (All the previous organizations mentioned in Employee Application Form).<br><br>
    
2.	<u>Academic Qualification : </u><br><br>
    Certificate(s) / Marksheet (s) awarded by University/Institutes for S.S.C., H.S.C., Graduation, Diploma level / Post graduation as applicable. <br><br>
        
3.	<u>Proof of Age (Any One) :</u><br><br>
    School Leaving Certificate, S.S.C. Certificate, Birth Certificate, Transfer Certificate<br><br>

4.	<b>Proof of Residence (Any One) :</b><br><br>
    Driving License, Passport, Ration Card, Ownership Agreement, Bank Statement, Electricity Bill, Telephone Bill, Passport, Leave and License Agreement<br><br>
    
5.	<u>PAN Card</u><br><br>

6.	<u>Aadhaar Card </u>(in case of not having Aadhaar Card, please submit Enrolment ID receipt)<br><br>

7.	<u>Photographs</u> 	(3 passport size photos with white colour background)<br><br>
    1 stamp size photograph for ID Card<br><br>

<b>•	Please note that the copies of qualification/ mark sheets and experience certificates should be duly attested or else originals can be produced for verification purpose.</b><br><br>

<b>•	You are requested to note that the processing of the salary will be subject to the submission of the PAN details. In case you do not have a PAN number please initiate the application process for the same immediately and carry the acknowledgement as issued by the Income Tax authorities with you on the day of joining. A copy of this acknowledgement would need to be submitted for our records, in the interim period, till you receive the PAN card.</b><br><br><br><br>


<br><br><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b><u>Initials</u></b>
EOD;


$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$pdf->Output('index.pdf');

?>