<?php
error_reporting(0);
include 'rb.php';
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$db=mysqli_connect("localhost", "root", "","cadss_db");
$admission_number=$_GET['admission_number'];
$course_id=$_GET['course_id'];
$year=$_GET['year'];
//$term=$_GET['term'];

//get the students details


$resultset2 = mysqli_query($db, "SELECT * FROM students  WHERE admission_number='$admission_number'");
while($users3=mysqli_fetch_array($resultset2))
        {
        $name=$users3['firstname']." ".$users3['lastname'];
        $adm=$users3['admission_number'];
        $level=$users3['level'];
       $course_id=$users3['course_id'];
      
        }

$resultset3 = mysqli_query($db, "SELECT * FROM courses  WHERE id= '$course_id'");
while($users3=mysqli_fetch_array($resultset3))
        {
        $coursename=$users3['coursename'];
        $course_id=$users3['department_id'];
        }

//calculating the fee paid and the marks
//$sqlf = "SELECT * FROM studentmarks  WHERE admission_number='$admission_number' AND year='$year' ";
$resultsetmarks = mysqli_query($db, "SELECT * FROM studentmarks  WHERE admission_number='$admission_number' AND year='$year' ");
while($users5 = mysqli_fetch_array($resultsetmarks)){
    $cosname=$users5['course'];
$subject= 'Advanced Networking';
    $sqlf = "SELECT * FROM courses WHERE id ='$cosname'";


    //echo
}

//end of calculation process
                                                
//$average=78;
//looking for average
if($level=="nc"){
    $lev= "NATIONAL CERTIFICATE";
}elseif( $level=="nd1") {
$lev= "NATIONAL DIPLOMA 1";

}elseif( $level =="nd3") {
$lev= "NATIONAL DIPLOMA 3";

}elseif( $level =="hnd") {
$lev= "HIGHER NATIONAL DIPLOMA";

}                                
                                           
                                              
                                                           
//looking for average
require('fpdf/fpdf.php');
class PDF extends FPDF
{

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Line(0, 600, 210,600);
    $this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'L');
    // $tDate=date('l \t\h\e jS');
    $this->Cell(0, 10, 'By:'.'KPPCASS', 0, false, 'C', 0, '', 0, false, 'T', 'M');
}
}


$pdf = new PDF();
$pdf->SetAuthor('KPPCASS');
$pdf->AliasNbPages();
//set font for the entire document
$pdf->SetFont('Times','B',20);
$pdf->SetTextColor(0,0,0);
//set up a page
$pdf->AddPage('P');
//$pdf->SetDisplayMode(real,'default');
//insert an image and make it a link

//display the title with a border around it
$pdf->Ln();
$pdf->SetFontSize(10);
$pdf->Cell(10,10,'MINISTRY OF HIGHER AND TERTIARY EDUCATION SCIENCE AND TECHNOLOGY DEVELOPMENT ' ,0,1);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,10,'HIGHER EDUCATION EXAMINATION COUNCIL ',0,0,'C',0);
$pdf->SetXY (20,30);
$pdf->SetFontSize(15);
$pdf->Cell(0,10,'INDVIDUAL STATEMENT OF RESULTS',0,0,'C',0);


//C MEANS CENTERED
//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (20,30);
$pdf->SetFontSize(10);

//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Ln(); //break 
$pdf->Cell(0,10,'Candidate Number :                     '.$adm ,0,1);
$pdf->Cell(0,10,'Student Name :                           '.$name ,0,1);
$pdf->Cell(0,10,'Instution Name :                         Kushing-Phikelela Polytechnic ',0,1);
$pdf->Cell(0,10,'Course Level :                            '.$lev ,0,1);
$pdf->Cell(0,10,'Course Title :                            '.$coursename ,0,1);


//This is teh date included in the submited form i.e printinvloice.php
$date=$_GET['date'];

$pdf->SetXY(150, 55);
$pdf->SetFontSize(10); 
$pdf->Cell(0,10,'Date :'.$date ,0,0,'R',0);

//Put a line here
$pdf->Ln(4); //break 
$pdf->Ln(4); //break 
$pdf->Ln(4); //break 
$pdf->Ln(4); //break 
$pdf->Ln(4); //break 
$pdf->Ln(4); //break 
$pdf->Ln(4); //break    
$pdf->Ln(4); //break        
$pdf->Line(0, 93, 210, 93);  //Set the line
$pdf->Ln(4); //line Break
$pdf->Cell(0,10,'Paper No                                               Subject                                            Grade' ,0,1);

$pdf->SetFont('Times','',10);
$pdf->Line(0, 100, 210, 100);  //Set the line
///marks to appear here
$student = R::findAll('studentmarks', 'admission_number =?', [$admission_number]);
 foreach ($student as $stud) {
     $category=$stud->course; 
     $cat_query = mysqli_query($db,"select * from subjects where id = '$category'");
     $cat_row = mysqli_fetch_array($cat_query);
     $cos_name=$cat_row['subjectname'];
     $course_code=$cat_row['subject_code'];
     $average= $stud->test2;
     if ($average > "80") {
        $classgrade="D";
    } 
    elseif (($average > "60") && ($average < "80"))
     {
        $classgrade="C";
    } 
    elseif (($average > "50") && ($average < "60"))
     {
        $classgrade="P";
    } 
    elseif (($average > "0") && ($average < "49"))
     {
        $classgrade="FAIL";
    } 
$pdf->Cell(0,10, $course_code.'                                      '. $cos_name .'                                                      '.$classgrade ,0,1);
}
$pdf->SetFont('','B');
$pdf->Cell(0,10,'Average                                                                                               '.$average ,0,1);

$pdf->Ln(20); //break  
$pdf->Line(0, 200, 210, 200);  //Set the line

/// Begin with regular font
//Output the fee summary values calculated above

$pdf->SetFont('','U');
$pdf->Cell(0,10,'Comment');
$pdf->SetFont('','');
$pdf->Ln();
$pdf->Cell(100,10,"GRADE ATTAINED:  ".$classgrade,1,0,'L',0);

//this ln things are ment to put line breaks great!!!!

$pdf->Ln();
$pdf->SetFont('','');
//change the color from the current blue to black, kudos
$pdf->SetTextColor(0,0,0);
$pdf->Write(10,'Exams Officer                                                       HOD                                                          Principal');
$pdf->Ln();
$pdf->Write(10,'---------------                                                       -------------                                                   --------------');

$pdf->SetXY(150, 220);
$pdf->SetFontSize(10);
$pdf->SetTextColor(255,60,0);
$pdf->SetFont('Times','u',10); 
$pdf->Cell(0,10,'KEY TO GRADES:',0,1,R,0);
$pdf->SetFont('','');
$pdf->Cell(0,10,'DISTINCTION: ABOVE 80',0,1,R,0);
$pdf->Cell(0,10,'CREDIT: 60 - 79 ',0,1,R,0);
$pdf->Cell(0,10,'PASS: 50 - 59 ',0,1,R,0);
$pdf->Cell(0,10,'FAIL: BELOW 50',0,1,R,0);

$pdf->SetXY(0, 240);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('','');
$pdf->Ln();
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('','i');
$pdf->Write(10,'NB: This is not a certificate');
$pdf->SetTextColor(0,0,0);
//nore text
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(10);//set the font size of the last line
$pdf->SetFont('','i');
$pdf->Write(10,'Please note that this statement of results is not a certificate and is ussued without any alterations');
$pdf->SetTextColor(0,0,0);


$pdf->Output();
?>