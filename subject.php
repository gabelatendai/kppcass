<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 16/8/2018
 * Time: 11:44
 */
?>
<title>Upload assignment</title><?php
include "header.php" ;
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$id = @$_GET['id'];
$email = $_SESSION['id'];

$ini = R::findOne('subjects', 'id  = ?', [$id]);
$init = R::findOne('students', 'users_id  = ?', [$email]);
$adm=$init->id;
$me=$init->admission_number;

$level=$init->level;
$cos=$init->course_id;
if(isset($_POST['submit'])){

    //make some vars
    $date = date('Y-m-d H:i:s');
    $uploaddir = 'students_assignments/';
    $stamp = time();
    $uploadfile = $uploaddir.$stamp.basename($_FILES['attachment']['name']);
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
        $attachment = $uploadfile;
    } else {
        $error = TRUE;
        var_dump($uploadfile);
        echo "Possible file upload attack!\n";
    }
    $uploads = R::dispense('uploads');
    $uploads->assignment_title = $_POST['book_title'];
    $uploads->copyright_year = $_POST['copyright_year'];
     $uploads->student_id = $adm;
    $uploads->course_id = $cos;
    $uploads->subject_id = $id;
    $uploads->level = $level;
//$assignments->category= $_POST['category'];
    $uploads->date_upload = $date;
    $uploads->assignment_path=$attachment;
//$assignments
    R::store($uploads);
    $msg= 'Assignment  uploaded successfully';
  //  print ("<script>window.location.assign('upload_assignment.php')</script>");
}
?>


<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--**************************************************************************************************************************-->
            <div class="container" style="width:100%">

               <?php
               include  "stud_header.php";
               ?>
                <br>

            </div> </div> </div> </div>
<!--**************ths is the success msg on saving the cord-->

<!--*************************************************************************************************************************-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Assignment for <?php echo $ini->subjectname ?> </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label>Assignment Title</label>
                                <select class="form-control col-md-4"name="book_title" class="select2_single form-control"  tabindex="-1" required="required">
                                    <option value="theory_1">Theory Assignment 1</option>
                                    <option value="theory_2">Theory Assignment 2</option>
                                    <option value="prac_1">Practical Assignment 1</option>
                                    <option value="prac_2">Practical Assignment 2</option>
                                    <option value="prac_3">Practical Assignment 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Upload Assignment</label>
                                <input type="file" name="attachment" required >
                            </div>
                           <div class="form-group">
                                <label>Due Date
                                </label>

                                <input type="date" name="copyright_year" id="last-name2" class="form-control">
                            </div>


                            <button name="submit" class="btn btn-success" type="submit" class="btn btn-default">Submit</button>
                            <a href="staff.php"> <button type="reset" class="btn btn-default">Cancel</button></a>
                            <?php echo @$msg; ?>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class=" col-md-6">

        <div class="panel panel-primary">
        <div class="panel-heading"> Assignments for <?php echo $ini->subjectname ?> </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th>Assignment ID</th>
                                    
                                            <th>Assignment Title</th>
                                            <th>Submission Date</th>
                                            
                                            
                                             <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    
                            $count = R::findAll('assignments', 'subject_id = ?', [$id]);
                                        if (@$count) {


                                        foreach ($count as $row) {
                                        //  $idy=$row->id;
                                        $path = $row->assignment_path;
                                        $category = $row->subject_id;

                                        ?>
                                        <tr class="odd gradeX">
	                                        <td><?php echo $row->id; ?></td>

	                                        <td><?php echo $row->assignment_title; ?></td>
	                                        <td><?php echo $row->copyright_year; ?></td>


	                                        <td>

		                                        <a class="pull-right" href="<?php echo $path; ?>"
		                                           target="_blank"><b>Download Assignment </b></a></li>


	                                        </td>
                                        </tr>

                                        <?php }
                                        }
                                        else{
                                                ?>
		                                       <tr> <td><?php echo 'no assignments available'; ?></td>
		                                       </tr>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
        </div>
                    </div>


        <!-- /.col-lg-12 -->
    </div>
     <div class="panel panel-primary">
		<div class="panel-heading"> Marks for <?php echo $ini->subjectname ?> </div>
	<div class="table-responsive">
		<table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

			<thead>
			<tr>
				<th></th>
				<th><center>Year</center></th>
				<th><center>Theory1</center></th>
				<th><center>Practical1</center></th>
				<th><center>ITTD1</center></th>
				<th><center>Test1</center></th>
				<th><center>Theory 2</center></th>
				<th><center>Practical 2</center></th>
				<th><center>ITTD 2</center></th>
				<th><center>Test 2</center></th>
				<th><center>Practical 3</center></th>
				<th><center>ITTD 3</center></th>
				<th><center>Practical course work Mark </center></th>
				<th><center>ITTD1 course work Mark</center></th>
				<th><center>Course work Mark </center></th>

				<script src="assets/js/jquery.dataTables.min.js"></script>
				<script src="assets/js/DT_bootstrap.js"></script>
			</tr>
			</thead>
			<tbody>
			<!--Calculating the totals marks************************************************************************************-->
            <?php

            // $student = R::findAll('studentmarks', 'admission_number =?', [$id]);
            //  foreach ($student as $stud) {

            $stud = R::findOne('studentmarks', 'admission_number = ? AND course = ?', [$me, $id]);
           // $user_query=mysqli_query($conn,"SELECT * from studentmarks  where course = '$id' and where admission_number = '$me' ");
            //while($stud=mysqli_fetch_array($user_query)) {
            //foreach ($student as $stud) {
                @$category=$stud->course;

                $prac1 =$stud['practical1'];
                $ittd1 =$stud['ittd1'];
                $prac2 =$stud['practical2'];
                $ittd2=$stud['ittd2'];
                $prac3 =$stud['practical3'];
                $ittd3 =$stud['ittd3'];


                $practcal = ($prac1 + $prac2 + $prac3)/3 /100* 30 ;
                $ittd= ($ittd1  + $ittd2+ $ittd3)/3 /100* 30;
                $total = $practcal + $ittd;
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
					<td width="30">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]"
						       type="checkbox" value="<?php echo $stud['id']; ?>">

					</td>
					<td>
						<center><?php echo $stud['year']; ?></center>
					</td>
					<td>
						<center><?php echo  $stud['theory1'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['practical1']; ?></center>
					</td>
					<td>
						<center><?php echo $stud['ittd1']; ?></center>
					</td>
					<td>
						<center><?php echo $stud['test1'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['theory2'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['practical2'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['ittd2'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['test2'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['practical3'] ; ?></center>
					</td>
					<td>
						<center><?php echo $stud['ittd3'] ; ?></center>
					</td>
					<td>
						<center><?php echo $practcal ; ?></center>
					</td>
					<td>
						<center><?php echo $ittd ; ?></center>
					</td>
					<td>
						<center><?php echo $total ; ?></center>
					</td>
				</tr>
                <?php
           // }
            ?>
		</table>

	</div>
     </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<br> <br> <br>
<!-- /#wrapper -->
<?php
include "footer.php";
?>
