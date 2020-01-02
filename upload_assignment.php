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
$email = $_SESSION['id'];

$init = R::findOne('students', 'users_id  = ?', [$email]);
$adm=$init->id;
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
    $uploads->subject_id = $_POST['subject_id'];
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
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Assignment </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table">
                        <form action="upload_assignment.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label>Subject <span class="required" style="color:red;">*</span>
                                </label>

                                <select  name="subject_id" class="select2_single form-control" tabindex="-1" required="required">
                                    <?php

                                    $result= mysqli_query($conn,"select * from subjects WHERE level = '$level'  AND course_id = '$cos'");
                                    while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['id'];
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['subjectname']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
        <!-- /.col-lg-12 -->
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
