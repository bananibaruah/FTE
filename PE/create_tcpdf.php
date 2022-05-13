<?php
require_once("config.php");
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
$vp = $_POST["vp"];

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
$lta = $_POST['lta'];
$lta1 = round($lta / 12);
$Food_Allowance = $_POST['Food_Allowance'];
$Food_Allowance1 = round($Food_Allowance / 12);
$m_c_r = $_POST['m_c_r'];
$m_c_r1 = round($m_c_r / 12);
$Attire_Allowance = $_POST['Attire_Allowance'];
$Attire_Allowance1 = round($Attire_Allowance / 12);
$vr = $_POST['vr'];
$vr1 = round($vr / 12);
$driver_reimbursement = $_POST['driver_reimbursement'];
$driver_reimbursement1 = round($driver_reimbursement / 12);
$Retention_Allowance = $_POST['Retention_Allowance'];
$Retention_Allowance1 = round($Retention_Allowance / 12);

$Total_A = $_POST['Total_A'];
$Total_A1 = round($Total_A / 12);
$PF = $_POST['PF'];
$PF1 = round($PF / 12);
$ESIC = $_POST['ESIC'];
$ESIC1 = round($ESIC / 12);
$gratuity = $_POST['gratuity'];
$gratuity1 = round($gratuity / 12);

$Total_B = $_POST['Total_B'];
$Total_B1 = round($Total_B / 12);

$LTOTAL = $_POST['LTotal'];
$LTOTAL1 = round($LTOTAL / 12);
$Variable_Pay = $_POST['Variable_Pay'];
$Variable_Pay1 = round($Variable_Pay / 12);
$Total_II = $_POST['Total_II'];
$Total_II1 = round($Total_II / 12);

$TOTAL = $_POST['TOTAL'];
$TOTAL1 = round($TOTAL / 12);

$Code = $_POST['Code'];

$ins_sql = "INSERT INTO pe_jt(Code, Name, State,DOJ,Position,CTC,Basic,HRA,STATUTORY_BONUS,CONVEYANCE_ALLOWANCE,LTA,EXECUTIVE_ALLOWANCE,FOOD_ALLOWANCE,MOBILE_REIMBURSEMENT,ATTIRE_ALLOWANCE,VEHICLE_REIMBURSEMENT,RETENTION_ALLOWANCE,TOTAL_A,PF,ESIC,TOTAL_B,VARIABLE_PAY,TOTAL_AB,TOTAL) 
            Values('$Code', '$name', '$state', '$doj', '$Position', '$ctc', '$basic', '$hra',$Statutory_Bonus,'$Conveyance_Allowance','$lta','$Executive_Allowance','$Food_Allowance','$m_c_r', '$Attire_Allowance', '$vr', '$driver_reimbursement', '$Retention_Allowance', '$Total_A', '$PF', '$ESIC', '$gratuity', '$Total_B', '$LTOTAL', $Variable_Pay', '$Total_II', '$TOTAL')";

$link->query($ins_sql);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setFontSubsetting(true);
$pdf->SetFont('times', '', 10.8);
$pdf->SetMargins(10, 10, 15, true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 30);
$doj1 = date("F d, Y", strtotime($doj));

echo $doj1;

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
<br><br>$doj1<br>
$Code<br><br>
$name <br>
$Ad1 ,<br>
$Ad2 ,<br>
$Ad3 ,<br>
$City  $Pincode <br><br>
Dear $name , <br><br>
</b>
Further to our discussions we are pleased to offer you the role of "<b>$Position</b>". The detailed terms and conditions of your offer have been set out in Annexures I and II and are enclosed herewith.<br><br>
Please take the time to read and understand the offer details. Should you have any queries on the terms please contact your Talent Acquisition representative. <br><br>
You are requested to give us your e-mail confirmation of having accepted the terms and conditions of our offer letter within 2 days of our e-mail, followed by sending us a duly signed copy of the same in token of your acceptance of the said offer letter no later than 10 days from the date of issue of this letter, failing which this offer stands withdrawn. <br><br>
You are required to report for duty on <b>$doj1</b> not later than 9.30 a.m.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>       																							         
Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.<br><br>
<b>$name</b> we look forward to you joining NSEIT for a mutually rewarding association.<br><br>
Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>
Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br>
We request you to return all the documents attached duly signed and join us on or before <b>$doj1</b>.<br><br><br><brr>
<b><u><i>Signature & Date</i></u></b>
<P style="page-break-before: always">
EOD;

$html .= <<<EOD
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<b>OFFER LETTER OOFICE COPY</b>

<b>
<br><br>$doj1<br>
$Code<br><br>
$name <br>
$Ad1 ,<br>
$Ad2 ,<br>
$Ad3 ,<br>
$City  $Pincode <br><br>

Dear $name , <br><br>
</b>
Further to our discussions we are pleased to offer you the role of "<b>$Position</b>". The detailed terms and conditions of your offer have been set out in Annexures I and II and are enclosed herewith.<br><br>
Please take the time to read and understand the offer details. Should you have any queries on the terms please contact your Talent Acquisition representative. <br><br>
You are requested to give us your e-mail confirmation of having accepted the terms and conditions of our offer letter within 2 days of our e-mail, followed by sending us a duly signed copy of the same in token of your acceptance of the said offer letter no later than 10 days from the date of issue of this letter, failing which this offer stands withdrawn. <br><br>
You are required to report for duty on <b>$doj1</b> not later than <b>9.30 a.m</b>.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.<br><br>
<b>$name</b> we look forward to you joining NSEIT for a mutually rewarding association.<br><br>
Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>
Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br>
We request you to return all the documents attached duly signed and join us on or before <b>$doj1</b>.<br><br><br><brr>
<b><u><i>Signature & Date</i></u></b>
<P style="page-break-before: always">
EOD;

$html .= <<<EOD
<br>$name<br><br><br>
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b><u>OFFER DETAILS</u></b><br>



<b>Place of Work:</b><br><br>
The initial place of work for carrying out your assignment shall be as given below: <br><br>
<b>Posting Location:</b> $City  <br>
<b>Base Location:</b> $City <br>
<b>Area of Operation:</b> NA<br>
<b>Note: NA <br></b><br>


Your working days will be <b>Monday to Friday</b>.<br><br>

<b>Remuneration:</b><br><br>
Your salary and allowances will be as per the details attached to this letter and marked as Annexure I. <br><br>

<b>Probation:</b><br><br>
You will be on probation for a period of 6 months from your date of joining. <br><br>

<b>Medical Fitness:</b><br><br>
Your appointment will be subject to your being found medically fit for service in the Company and furnishing a duly stamped and signed letter by a registered medical practitioner as a memorandum thereof.<br><br>

<b>Submission of Documents:</b><br><br>
At the time of reporting for duty the documents as per Annexure II should be submitted. Original documents must be produced for verification purposes and the same will be returned to you after completion of the verification process. The Company reserves the right to revoke the offer or appointment if any discrepancy is found in your documents. If any statement, documentation, declaration or information given by you at any time, is found to be fraudulent / false or if any material / particular is suppressed / misinformed, your services are liable to be terminated forthwith without any notice or compensation in lieu thereof.<br><br>
Your appointment will be subject to your furnishing such information as the Company may require from time to time and subject to your services being acceptable in the light of the information furnished.<br><br>

<b>Background Verification:</b><br><br>
Background Verification:The Company reserves the right to carry out reference verifications or background checks (not restricted to the last salary drawn, past employment, use of banned / illegal drugs / narcotic substances, criminal records etc.) prior to your joining the Company or during the course of your employment with the Company. You understand and acknowledge that this is a requirement and you have no objections whatsoever if such checks are carried out by the company or a third party agency engaged by the company. <br><br>
<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b>_________________</b><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Initials</b>
<br>
EOD;

$html .= <<<EOD
<br><br>
<br>$name<br><br>
<b>Notice Period / Termination:</b><br><br>



a.	Either party can terminate the contract of employment by giving 90 (Ninety) days notice in writing (subject further that such requirement shall extend to you during the tenure of probation period as well) subject to the Company’s right to pay salary in lieu thereof to you. The Company may also waive the requirement of serving notice period by you, either in full or part, solely at its own discretion and recover salary in lieu of notice period <i>(pro rata if applicable)</i> from you. However, should you sign any Service Agreement / undertaking with the company as a part of your employment process or later during the course of your employment with the company, you will then not be allowed to terminate your employment with the company unless you comply with the terms and conditions of the Service Agreement / Undertaking. <br><br>

b.	It will be mandatory for you to serve the full notice period without taking any leave to help with complete hand over of all your responsibilities to an identified person. Any exceptions to this will be allowed only on 
Special approval of your BU head. In such cases your notice period and release date will be extended on a pro-rata basis to the extent of the leaves taken.
 <br><br>

c.	Company may, in certain circumstances, prefer to terminate your services without the notice period or a reduced notice period if there is a lack of business opportunity or your non competence, in such case, you will be paid salary in lieu of thereof for those many days<br><br>

d.	Similarly, if you are willing to serve the full notice period but the Company desires your early release for any reason, the Company will pay you salary in lieu of the relevant notice period.<br><br>

e.	Your services are liable to be terminated forthwith without any notice or compensation or in the alternative, you shall be liable to disciplinary action and imposition of penalty in accordance with the Company Staff Rules if after your report for duty the Company receives information that you have prior to joining the Company’s services committed any act of misconduct, furnished fraudulent information or during your service in the Company, violated Company policy/ Code of conduct/ Staff Rules and regulations, Employment contract or if you are guilty of any act of misconduct, dishonesty, fraud, misdemeanor, which, in the opinion of the Company renders you unfit to serve in the Company.<br><br>

f.	Salary in all the above cases refers to Basic Salary.  <br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b>_________________</b><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Initials</b>

<br><br>

EOD;


$html .= '' . $name . '<br>

&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<b>Annexure I</b><br><br>

<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray width:100% height:100%;">
   <tr style="background-color:white;color:black;">
        <td style= "width:15%;"><b></b></td>
        <td style= "width:45%;"><b><center>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ANNEXURE I</center></b></td>
        <td style= "width:20%;"><b>&nbsp; &nbsp; &nbsp;Location</b></td>
		<td style= "width:20%;"><b>&nbsp; &nbsp; &nbsp;' . $City . '</b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;&nbsp;Name</b></td>
      <td><b>&nbsp; &nbsp; &nbsp;' . $name . '</b></td>
        <td><b></b></td>
        <td><b></b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;Designation</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;' . $Position . '</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Grade</b></td>
		<td><b>&nbsp; &nbsp; &nbsp;' . $grade . '</b></td>
    </tr>
	<tr>
        <td><b>&nbsp; &nbsp; &nbsp;wef</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;' . $Sd . '</b></td>
		<td style="text-align:center" colspan="2">&nbsp; <b>All Figures in INR</b></td>
    </tr>
	<tr>
        <td><b></b></td>
        <td><b></b></td>
		<td style="text-align:center"><b>Monthly</b></td>
		<td style="text-align:center"><b>Annual</b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;PART I</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Fixed Components</b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;A</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Salary</b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Basic</td>
		<td style="text-align: right;">' . $basic1 . '</td>
		<td style="text-align: right;">' . $basic . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;HRA</td>
        <td style="text-align: right;">' . $hra1 . '</td>
        <td style="text-align: right;">' . $hra . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Conveyance Allowance</td>
		<td style="text-align: right;">' . $Conveyance_Allowance1 . '</td>
		<td style="text-align: right;">' . $Conveyance_Allowance . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Statutory Bonus</td>
		<td style="text-align: right;">' . $Statutory_Bonus1 . '</td>
		<td style="text-align: right;">' . $Statutory_Bonus . '</td>
    </tr>';

if ($lta1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;LTA</td>
		<td style="text-align: right;">' . $lta1 . '</td>
		<td style="text-align: right;">' . $lta . '</td>
    </tr>';
}
$html .= '<tr>
    <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Executive Allowance</td>
        <td style="text-align: right;">' . $Executive_Allowance1 . '</td>
        <td style="text-align: right;">' . $Executive_Allowance . '</td>
    </tr>';
if ($Food_Allowance1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Food Allowance</td>
		<td style="text-align: right;">' . $Food_Allowance1 . '</td>
		<td style="text-align: right;">' . $Food_Allowance . '</td>
    </tr>';
}
if ($m_c_r1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Mobile Reimbursement Charges</td>
		<td style="text-align: right;">' . $m_c_r1 . '</td>
		<td style="text-align: right;">' . $m_c_r . '</td>
    </tr>';
}
if ($Attire_Allowance1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Attire Allowance</td>
		<td style="text-align: right;">' . $Attire_Allowance1 . '</td>
		<td style="text-align: right;">' . $Attire_Allowance . '</td>
    </tr>';
}

if ($vr1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Vehicle Reimbursement</td>
		<td style="text-align: right;">' . $vr1 . '</td>
		<td style="text-align: right;">' . $vr . '</td>
    </tr>';
}

if ($driver_reimbursement1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Driver Reimbursement</td>
		<td style="text-align: right;">' . $driver_reimbursement1 . '</td>
		<td style="text-align: right;">' . $driver_reimbursement . '</td>
    </tr>';
}

if ($Retention_Allowance1 != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Retention Allowance</td>
		<td style="text-align: right;">' . $Retention_Allowance1 . '</td>
		<td style="text-align: right;">' . $Retention_Allowance . '</td>
    </tr>';
}

$html .= '<tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total A</b></td>
		<td style="text-align: right;"><b>' . $Total_A1 . '</b></td>
		<td style="text-align: right;"><b>' . $Total_A . '</b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;B</b></td>
        <td><b>&nbsp; &nbsp; &nbsp; Retirals / Other Benefits </b></td>
        <td><b></b></td>
		<td><b></b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Employer Contribution to Provident Fund </td>
		<td style="text-align: right;">' . $PF1 . '</td>
		<td style="text-align: right;">' . $PF . '</td>
    </tr>';


if ($ESIC != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;ESIC</td>
		<td style="text-align: right;">' . $ESIC1 . '</td>
		<td style="text-align: right;">' . $ESIC . '</td>
    </tr>';
}

$html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Gratuity</td>
		<td style="text-align: right;">' . $gratuity1 . '</td>
		<td style="text-align: right;">' . $gratuity . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total B</b></td>
		<td style="text-align: right;"><b>' . $Total_B1 . '</b></td>
		<td style="text-align: right;"><b>' . $Total_B . '</b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total of PART I (A+B)</b>  </td>
		<td style="text-align: right;"><b>' . $LTOTAL1 . '</b></td>
		<td style="text-align: right;"><b>' . $LTOTAL . '</b></td>
    </tr>  
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;PART II</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Variable Components</b>  </td>
        <td><b></b></td>
        <td><b></b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;' . $vp . ' </td>
        <td></td>
        <td style="text-align: right;">' . $Variable_Pay . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp; Total of Part II</b>  </td>
		<td><b></b></td>
		<td style="text-align: right;"><b>' . $Total_II . '</b></td>
    </tr>
    <tr>
    <td><b></b></td>
        <td><b> &nbsp; &nbsp; &nbsp;Cost to Company Part I + Part II</b>  </td>
        <td><b></b></td>
        <td style="text-align: right;"><b>' . $TOTAL . '</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>&nbsp; &nbsp; Please note: </b></td>
    </tr>
    <tr>
        <td colspan="4">&nbsp; &nbsp;1. All Allowances / Bonuses / Incentives / Rewards / Benefits will be paid / reimbursed as per the Company policy.<br> &nbsp; &nbsp;Employees who are on the rolls of the organization on the day of disbursement will be eligible for the same. <br>&nbsp; &nbsp;2. All employees are requested to keep themselves updated with changes announced in policies and procedures on the <br>&nbsp; &nbsp;HRMS. <br> &nbsp; &nbsp;3. Payment of Gratuity will be in accordance with the Gratuity Act, 1972.<br>&nbsp; &nbsp;4. Incase of any amendment in compliance law, the company reserves right to restructure the salary components <br>&nbsp; &nbsp;keeping the CTC intact adhering to compliance
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp; &nbsp;* Currently paid bi-annually in April and October every year s.t. performance and you being confirmed on rolls of <br>&nbsp; &nbsp;organization.
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp; &nbsp;<b>In addition to the above: </b><br>&nbsp; &nbsp;The company provides the following benefits for their employees, the premium for which is directly paid by the <br>&nbsp; &nbsp;company:<br>
        &nbsp; &nbsp;a. Mediclaim for employees and their eligible dependents (as defined by the company).<br>
        &nbsp; &nbsp;b. Personal Accident Policy for the employees        
        </td>
    </tr>
</table>
<br><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b>_________________</b><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Initials</b>
<P style="page-break-before: always"><br>
';

$html .= <<<EOD
<br>$name<br>
<br><br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>ANNEXURE II</b><br>
<br>



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


<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b>_________________</b><br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<b>Initials</b>

<br>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$pdf->Output('index.pdf');

?>