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
$jbamount = $_POST["jbamount"];
$Position = $_POST["Position"];
$Pincode = $_POST["Pincode"];
$City = $_POST["City"];
$vp = $_POST["vp"];

$state = $_POST["state"];
$grade = $_POST["grade"];

$ctc = $_POST["ctc"];

$basic = $_POST["basic"];
$basicp = $_POST['basicp'];
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

$wsd = $_POST['wsd'];
$wed = $_POST['wed'];

$aloc = $_POST['aloc'];

$Code = $_POST['Code'];
$chkPassPort = $_POST['chkPassPort'];

$ins_sql = "INSERT INTO fte_ol(Code, Name, Address1, Address2, Address3, City, Pincode, State, Start_Date, End_Date, DOJ,Position,CTC,Basic_Per, Basic,HRA,STATUTORY_BONUS,CONVEYANCE_ALLOWANCE,EXECUTIVE_ALLOWANCE,TOTAL_A,PF,ESIC,TOTAL_B,TOTAL, J_Bonus) 
            Values('$Code', '$name', '$Ad1', '$Ad2', '$Ad3', '$City', '$Pincode', '$state', '$Sd', '$ed', '$doj', '$Position', '$ctc', '$basicp', '$basic', '$hra',$Statutory_Bonus,'$Conveyance_Allowance','$Executive_Allowance','$Total_A', '$PF', '$ESIC', '$Total_B', '$TOTAL', '$jbamount')";

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
$Sd1 = date("F d, Y", strtotime($Sd));
$ed1 = date("F d, Y", strtotime($ed));

function CurrencyFormat($number)
{
    $decimalplaces = 2;
    $decimalcharacter = '.';
    $thousandseparater = ',';
    $lakhseparater = ',';

    return number_format($number, $decimalplaces, $decimalcharacter, $thousandseparater, $lakhseparater);
}

// echo $doj1;

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = 'header.png';
        $this->Image($image_file, 6, 9, 170, '', 'png', '', 'T', false, 200, '', false, false, 0, false, false, false);
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
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<b>OFFER LETTER </b>

<b>
<br>$doj1<br>
$Code<br><br>
$name <br>
$Ad1 ,<br>
$Ad2 ,<br>
$Ad3 ,<br>
$City  $Pincode <br><br>
Dear $name , <br><br>
</b>
We are pleased to offer you employment in our organization NSEIT ltd as “<b>$Position</b>” for a fixed period of employment (Contract) on the following terms and conditions.<br><br>
The term of your employment shall be valid from <b>$Sd1</b> to <b>$ed1</b>. Notwithstanding this, in the event of the project/work for which you are being employed terminates before the aforementioned period, this contract shall be co terminus with the project/work. <br><br>
Details of your salary break up with components are as per the Annexure I attached herewith.<br><br>
This contract shall be terminable by either party giving 30 days notice in writing or salary in lieu of notice to the other party.<br><br>
In addition to the terms of appointment mentioned in this letter you are also governed by the terms and conditions of the company, which are attached to this letter. The combined rules and procedures as contained in this letter and the annexure will constitute the employment rules and you are required to read both of them in conjunction.	<br><br>
As a token of your understanding and acceptance of the terms and conditions you are requested to sign the duplicate copy of this letter and return it within a day, failing which this offer stands withdrawn. <br><br>
You are required to report for duty on <b>$Sd1</b> not later than <b>9.30 a.m</b>.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>
Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.
Wishing you the very best for your assignment with us.<br><br>
Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>
Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br>
<i><u><b>Signature & Date</b></u></i><br>



EOD;

$html .= <<<EOD
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>OFFER LETTER OFFICE COPY </b>

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
We are pleased to offer you employment in our organization NSEIT ltd as “<b>$Position</b>” for a fixed period of employment (Contract) on the following terms and conditions.<br><br>
The term of your employment shall be valid from <b>$Sd1</b> to <b>$ed1</b>. Notwithstanding this, in the event of the project/work for which you are being employed terminates before the aforementioned period, this contract shall be co terminus with the project/work. <br><br>
Details of your salary break up with components are as per the Annexure I attached herewith.<br><br>
This contract shall be terminable by either party giving 30 days notice in writing or salary in lieu of notice to the other party.<br><br>
In addition to the terms of appointment mentioned in this letter you are also governed by the terms and conditions of the company, which are attached to this letter. The combined rules and procedures as contained in this letter and the annexure will constitute the employment rules and you are required to read both of them in conjunction.	<br><br>
As a token of your understanding and acceptance of the terms and conditions you are requested to sign the duplicate copy of this letter and return it within a day, failing which this offer stands withdrawn. <br><br>
You are required to report for duty on <b>$Sd1</b> not later than <b>9.30 a.m</b>.  If you do not join by this date then this offer would automatically stand withdrawn, unless the date of joining is revised and is communicated to you in writing.<br><br>
Note: This offer made to you is on the basis of the details declared by you in the Employment Application Form (EAF). In case of any discrepancies found in the EAF the said offer will stand null and void with immediate effect.
Wishing you the very best for your assignment with us.<br><br>
Yours sincerely,<br>
<img src="Sig.png" style="height:60px , width:30px"><br>
<b>Tina Mathew<br>
Head – HR<br><br>
Encl:-</b><br>
&nbsp;&nbsp;&nbsp;1.	Offer details<br>
&nbsp;&nbsp;&nbsp;2.	Annexure I and II.<br><br>
<i><b><u>Signature & Date</u></b></i>
EOD;

$html .= '
<br><br><br>' . $name . '<br><br><br>
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b><u>OFFER DETAILS</u></b><br><br><br>


<b>1.	Term of employment:</b><br>

You are on a fixed term employment from <b>' . $Sd1 . '</b> to <b>' . $ed1 . '</b>.<br><br>

Your working days will be <b>' . $wsd . '</b> to <b>' . $wed . '</b>.<br><br>


<b>2.	Probation:</b><br>

You will be on probation for a period of 3 months from your date of joining.<br><br>



<b>3.	Remuneration:</b><br>';
if ($chkPassPort == "no") 
{
    $html .= 'Your salary and allowances will be as per the details attached to this letter and marked as Annexure I.';


    $html .= '<br><br><br>';
}
if ($chkPassPort == "yes") 
{
    $html .= 'Your salary and allowances will be as per the details attached to this letter and marked as Annexure I.<br>In addition to the compensation package detailed in Annexure I, you will be eligible to receive a total amount of
    <b>' . $jbamount . '</b> as a part of a Joining Bonus only if you join the company on or before <b>' . $Sd1 . '</b>
    (TDS would be deducted as applicable on the said amount.) In the event that you cease to be in the employment of 
    the company within 12 months of your joining date, you shall pay back the entire amount paid to you as a Joining Bonus. 
    Further, the said amount is due and payable to you as a joining bonus shall be paid to you at the time and along with 
    the salary payable to you at the end of the second month from the month in which you have joined the services of the company.
    <br><br>';
}

$html .= '
<b>4.	Medical Fitness:</b><br>

Your appointment will be subject to your being found medically fit for service in the Company and furnishing a duly stamped and signed letter by a registered medical practitioner as a memorandum thereof.
<br><br>

<b>5.	Submission of Documents:</b><br><br>
Your appointment is been made on the basis of the particulars such as qualification, experience etc. as given in your application. If any statement, documentation, declaration or information given by you at any time, is found to be fraudulent / false or if any material / particular is suppressed / misinformed, your services are liable to be terminated forthwith without any notice or compensation in lieu thereof.
<br>
Your appointment will be subject to your furnishing such information as the Company may require from time to time and subject to your services being acceptable in the light of the information furnished.
<br><br>


<b>6.	Background Verification:</b><br><br>

The Company reserves the right to carry out reference verifications or background checks (not restricted to the last salary drawn, past employment, use of banned / illegal drugs / narcotic substances, criminal records etc.) prior to your joining the Company or during the course of your employment with the Company. You understand and acknowledge that this is a requirement and you have no objections whatsoever if such checks are carried out by the company or a third party agency engaged by the company.

<br><br><br><br>
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
<br><br><br><br><br><br><br><br><br><br>
';




$html .= '<br>' . $name . '<br><br><br>

&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<b>Annexure I</b><br>
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<u><b>COMPENSATION DETAILS </b></u>
<br><br>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray width:100% height:100%;">
<tr>
        
		<td style="text-align:center" colspan="4">&nbsp; <b>ANNEXURE I</b></td>
    </tr>

    <tr>
      <td style= "width:15%;"><b>&nbsp; &nbsp; &nbsp;FTE Name</b></td>
      <td style= "width:45%;"><b>&nbsp; &nbsp; &nbsp;' . $name . '</b></td>
      <td style= "width:20%;"><b>&nbsp; &nbsp; &nbsp;Location</b></td>
      <td style= "width:20%;"><b>&nbsp; &nbsp; &nbsp;' . $aloc . '</b></td>
    </tr>
    <tr>
        <td><b>&nbsp; &nbsp; &nbsp;Designation</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;' . $Position . '</b></td>
        <td></td>
		<td></td>
    </tr>
	<tr>
        <td><b>&nbsp; &nbsp; &nbsp;w.e.f</b></td>
        <td><b>&nbsp; &nbsp; &nbsp;' . $Sd1 . '</b></td>
		<td style="text-align:center"><b>Grade</b></td>
		<td style="text-align:center"><b>' . $grade . '</b></td>
    </tr>
	<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;<b>Compensation Head</b></td>
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
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $basic1) . '</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $basic) . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;HRA</td>
        <td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $hra1) . '</td>
        <td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $hra) . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Conveyance Allowance</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Conveyance_Allowance1) . '</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Conveyance_Allowance) . '</td>
    </tr>
    <tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Statutory Bonus</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Statutory_Bonus1) . '</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Statutory_Bonus) . '</td>
    </tr>';


$html .= '<tr>
    <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;Executive Allowance</td>
        <td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Executive_Allowance1) . '</td>
        <td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Executive_Allowance) . '</td>
    </tr>';


$html .= '<tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total A</b></td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Total_A1) . '</b></td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Total_A) . '</b></td>
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
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $PF1) . '</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $PF) . '</td>
    </tr>';


if ($ESIC != 0) {
    $html .= '<tr>
        <td><b></b></td>
        <td>&nbsp; &nbsp; &nbsp;ESIC</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $ESIC1) . '</td>
		<td style="text-align: right;">' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $ESIC) . '</td>
    </tr>';
}

$html .= '<tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total B</b></td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Total_B1) . '</b></td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $Total_B) . '</b></td>
    </tr>
    <tr>
        <td><b></b></td>
        <td><b>&nbsp; &nbsp; &nbsp;Total of PART I (A+B)</b>  </td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $TOTAL1) . '</b></td>
		<td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $LTOTAL) . '</b></td>
    </tr>  
   
    <tr>
    <td><b></b></td>
        <td><b> &nbsp; &nbsp; &nbsp;Cost to Company PART I (A + B) </b>  </td>
        <td><b></b></td>
        <td style="text-align: right;"><b>' . preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $TOTAL) . '</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>&nbsp; &nbsp; Please note: </b></td>
    </tr>
    <tr>
        <td colspan="4">&nbsp; &nbsp;Please note:<br>
        The company provides the following benefits for their FTEs, the premium for which is directly paid by the company:<br>
        * Personal Accident Policy for the FTEs.<br>
        * Incase of any amendment in compliance law, the company reserves right to restructure the salary components keeping the CTC  intact adhering to compliance.<br>
        
        </td>
    </tr>
   
</table>
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
<P style="page-break-before: always"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
';

$html .= '
<br><br><br><br><br><br><br><br><br><br>' . $name . '<br>
<br><br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<b>Annexure II</b><br>
<br>



&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; 
<b><u>LIST OF DOCUMENTS</u></b><br><br>

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
';

$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$pdf->Output('index.pdf');

?>