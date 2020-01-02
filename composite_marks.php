<?php
include("header.php");
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 18/8/2018
 * Time: 00:23
 */

error_reporting(0);//turning off error reporting

//include('config.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
$id=$_GET['course'];
$user=mysqli_query($conn,"SELECT * from subjects where id = '$id'");
$r=mysqli_fetch_array($user);
$cosid=$r['course_id'];
//course code
$depart=mysqli_query($conn,"SELECT * from coscode WHERE  id= '$cosid'");
$department=mysqli_fetch_array($depart);

$coscode=$department['course_code'];

$department=$department['course_id'];
//course name
$de=mysqli_query($conn,"SELECT * from courses WHERE  id= '$department'");
$departm=mysqli_fetch_array($de);

//$hod= $department['hod'];
if( $r['level'] =="nc"){
    $level= "NATIONAL CERTIFICATE";
}elseif( $r['level'] =="nd1") {
    $level= "NATIONAL DIPLOMA 1";

}elseif( $r['level'] =="nd3") {
    $level= "NATIONAL DIPLOMA 3";

}elseif( $r['level'] =="hnd") {
    $level= "HIGHER NATIONAL DIPLOMA";

}
?>
<script type="text/javascript" >
	function printlayer(layer)
	{
		var generator =window.open(",'name,");
		var layetext =document.getElementById(layer);
		generator.document.write(layetext.innerHTML.replace("Print Me"));

		generator.document.close();
		generator.print();
		generator.close();
	}
	function myFunction() {
		var d = new Date();
		var name = "Designed by: Gabriel Musodza";
		document.getElementById("demo").innerHTML = Date();
		document.getElementById("demo").innerHTML = name;
	}
</script>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php

                include("mark_header.php");

                ?>
                <br>

            </div></div></div>

    <!--*************************************************************************************************************************-->
    <div id="page-wrapper">
        <div class="container-fluid">


            <!-- Page Heading -->

            <td style="width:30px"><a button type='button'  onClick="javascript:printlayer('div-id-name')" class="btn btn-primary glyphicon  glyphicon-print"></a></td>
            <td><a button type='button' class="btn btn-primary" href="markstep1">Back</a></td></tr>
        </div>
	    <div id="div-id-name">
		    <h3 class="text-center" align="center">HIGHER EDUCATION EXAMINATIONS COUNCIL</h3>
        <table  class="" id="x" width="1500" >

<thead>

<tr>

	      <!--  <div id="printablediv" class="col-md-4">-->
		       <td width="300px"> <p>CENTRE NUMBER: 004</p></td>
			<td width="300px"><p>COORDINATING COLLEGE : KUSHINGA PHIKELELA POLYTECHNIC</p></td>
</tr>

<tr><td><p>AREA OF SPECIALISATION:  <?php echo $departm['coursename']; ?></p>

	</td>
<td><p>COURSE CODE: <?php echo $coscode; ?> </p>
	</td>
</tr>
<tr><td><p>SUBJECT CODE:  <?php echo $r['subject_code'] ?>  </p> </td>

	<td><p style="width:100%; font-size:15px;">SUBJECT TITLE: <?php echo $r['subjectname'] ?> </p>
				   </td></tr>
		   <tr> <td><p>EXAMINATION DATE:  November 2019</p>
			   </td><td>
			   <p>CATEGORY :(1ST SITTING/ RE-WRITE):_1ST SITTING______________</p>

			   </td>

			   </tr>
<tr><td><p>EXAMINATION SESSION:  November 2019</p></td>
<td>  <p>LEVEL OF AWARD: <?php echo  $level; ?>
</td>
</tr>



</thead></table>
		        </p>

		    <div class="x_content">
			    <!-- content starts here -->
			    <div id="div-id-name">
				    <div class="table-responsive">
                            <table cellpadding="0"  border="1"  width="1500" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="x">

                                    <thead>

                                    <tr>

	                                    <th rowspan="2"><center>Fullname</center></th>
	                                    <th colspan="3" align="center"> Term 1</th>
	                                    <th rowspan="2"><center>FBA 1</center></th>
	                                    <th colspan="3">Term 2</th>
	                                    <th rowspan="2"><center>FBA 2</center></th>
	                                    <th><center>Term 3</center></th>
	                                    <th rowspan="2"><center>Total 30%</center></th>
	                                    <th colspan="3" ><center>INDUSTRIAL COMPETENCES </center></th>
	                                    <th rowspan="2"><center>30%</center></th>
	                                    <th rowspan="2"><center>60%</center></th>
	                                    <th rowspan="2"><center>C/W 60%</center></th>
                                    </tr>
                                    <tr>


                                        <th><center>THEO 1</center></th>
                                        <th><center>PRAC 1</center></th>

                                        <th><center>TEST 1</center></th>

                                        <th><center>THEO 2</center></th>
                                        <th><center>PRAC 2</center></th>

                                        <th><center>TEST 2</center></th>
                                        <th><center>PRAC 3</center></th>
	                                   <th><center>ITTD 1</center></th>
	                                    <th><center>ITTD 2</center></th>
                                        <th><center>ITTD 3</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--Calculating the totals marks************************************************************************************-->
                                    <?php

                                    $user_query = R::findAll('studentmarks', 'course =? ', [$id]);
                                   foreach ($user_query as $stud) {

                                        $category=$stud->course;
                                        $prac1 =$stud->practical1;
                                        $ittd1 =$stud->ittd1;
                                        $prac2 =$stud->practical2;
                                        $ittd2=$stud->ittd2;
                                        $prac3 =$stud->practical3;
                                        $ittd3 =$stud->ittd3;
									$admission_number=$stud->admission_number;

                                        $exammark =$stud->exam_mark;
                                        $exam = $exammark*40/100;
                                        $user=mysqli_query($conn,"SELECT * from students where admission_number = '$admission_number' ORDER BY lastname");
                                        $cat_row=mysqli_fetch_array($user);

                                        $name=$cat_row['lastname']."    " . $cat_row['firstname'];
                                      /*  <!--field based assessment 1-->*/
										   $f = $stud->theory1 + $stud->practical1+ $stud->test1;
                                        $ff1= $f/3;

                                        $fb1=  round( $ff1,0);
                                        /*  <!--field based assessment 2-->*/
                                         $f1 = $stud->theory2 + $stud->practical2+ $stud->test2;
                                         $b =$f1/3;
                                        $fb2=  round( $b,0);
                                        /*  <!--field based assessment 1-->*/
                                        $fb =$fb1 + $fb2 + $prac3 ;
	                                        $fba=$fb/300 * 30 ;
                                        $practcal = ($prac1 + $prac2 + $prac3)/3 /100* 30 ;
                                        $ittd= ($ittd1  + $ittd2+ $ittd3)/3 /100* 30;
                                        $total = $practcal + $ittd;
                                      $cw =  $fba + $ittd   ;
                                        $exam_mark = $exam+ $cw;
                                        $final_mark=  round( $exam_mark,0);
	                                    /*
                                                                                                                              if ( $average > 80 ){
                                                                                                                                  $msg = "DISTINCTION";
                                                                                                                                  $area = "Programmer, Software Engineer";
                                                                                                                              }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                                                                  $msg = "Database Administrator, System Analyst";

                                                                                                                              }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                                                                  $msg = "Hardware Technician ";
                                                                                                                              }else if ( $average < 50 ){

                                                                                                                                  $msg = "Typist";
                                                                                                                              }
                                                                                */
                                        ?>

                                        <tr>
                                            <td>
                                                <center><?php  echo $name ; ?></center>
                                            </td>


                                            <td>


	                                                <?php
	                                                if ($stud->theory1< 50 ){
	                                                	?>
		                                                <center style="color: red"><?php echo $stud->theory1; ?></center>
	                                                <?php
	                                                }else{?>
	                                                <center style="color: blue"><?php echo $stud->theory1; }?></center>
                                            </td>
                                            <td><?php
                                                if ($stud->practical1< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->practical1; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->practical1; }?></center>
                                            </td>
                                           <!---->
                                            <td>
                                                <?php
                                                if ($stud->test1< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->test1; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->test1; }?></center>
                                            </td>
	                                        <td>
		                                        <center><?php  echo $fb1; ?></center>
	                                        </td>
                                            <td>
                                                <?php
                                                if ($stud->theory2< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->theory2; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->theory2; }?></center>
                                            </td>
                                            <td>
                                                <?php
                                                if ($stud->practical2< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->practical2; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->practical2; }?></center>
                                            </td>
                                          <!--  -->
                                            <td>
                                                <?php
                                                if ($stud->test2< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->test2; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->test2; }?></center>
                                            </td>
	                                        <td>
		                                        <center><?php  echo $fb2; ?></center>
	                                        </td>
                                            <td>
                                                <?php
                                                if ($stud->practical3< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->practical3; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->practical3; }?></center>
                                            </td>
	                                        <td>
		                                        <center><?php  echo $fba; ?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud->ittd1< 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud->ittd1; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud->ittd1; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud->ittd2< 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud->ittd2; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud->ittd2; }?></center>
	                                        </td>
                                            <td>
                                                <?php
                                                if ($stud->ittd3< 50 ){
                                                    ?>
		                                            <center style="color: red"><?php echo $stud->ittd3; ?></center>
                                                    <?php
                                                }else{?>
	                                            <center style="color: blue"><?php echo $stud->ittd3; }?></center>

                                            </td>
	                                        <td>
		                                        <center><?php echo $ittd ; ?></center>
	                                        </td>
                                            <td>

                                                <center><?php echo $cw ; ?></center>
                                            </td>
	                                        <td>
		                                        <center><?php echo $cw ; ?></center>
	                                        </td>

                                        </tr>

                                        <?php
                                   }
                                    ?>
                                    </tbody>
                            </table></div>
				    <table  class="" id="example" width="1500" >

					    <thead>

					    <tr width="800">
		                   <td width="300"> HOD:________________</td><td  width="200"> SIGN: ___________________</td><td>DATE:_______________</td>
		                   <td width="400"> MODERATOR:___________________  </td><td  width="200">  SIGN:_________________</td><td>DATE:___________________</td>

					    </tr>

					    <tr >
		                   <td  width="300"> EXAMINER:_____________________ </td><td  width="200">SIGN:________________</td><td>DATE:__________________</td>
		                   <td width="400">INVIGILATOR:____________________</td><td  width="200">SIGN: _________________</td><td>DATE: ________________  </td>

					    </tr>
					    <br> 
					    <tr width="800">
		                   <td width="300"> EXTERNAL ASSESSOR CW: _______________ </td><td  width="200">SIGN:__________________</td><td>DATE:________________</td>
		                   <td width="400">EXTERNAL ASSESSOR EXAM:_________________  </td><td  width="200">   SIGN: ________________</td><td>DATE: _______________</td>

					    </tr>



					    </thead></table>
                    </DIV>
                    <!-- block 8***************************************************************************************-->


                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- /#page-wrapper -->
</div>
<!--*********************************************************************************-->
<?php
include("footer.php");
?>

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
</body>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "NC January Intake Class List",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "NC January Intake Class List",

				},
				{
					extend: 'csv',
					text: 'CSV',
					orientation: 'landscape',
					title: "NC January Intake Class List",
				},
				{
					extend: 'print',
					text: 'Print',
					orientation: 'landscape',
					title: "NC January Intake Class List",

				},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "NC January Intake Class List",

				}],
		} );
	} );

</script>
