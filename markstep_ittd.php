<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 16:06
 */
?>
<?php
error_reporting(0);//turning off error reporting
include("header.php");
?>
<?php
$conn=mysqli_connect("localhost", "root", "","cadss_db");
//R::setup('mysql:host=localhost;dbname=sms2', 'root', ''); //for both mysql or mariaDB
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$id = @$_GET['course'];
$result= mysqli_query($conn,"select * from subjects where id =  '$id'") or die (mysql_error());
$row= mysqli_fetch_array ($result);
$name = $row['subjectname'];
$level = $row['level'];
$cos_id=$row['course_id'];
if (isset($_POST['update'])){

    $number = $_POST['admission_number'];
    $pra=$_POST['ittd1'];

    $init = R::findOne('studentmarks', 'course = ? AND admission_number = ?', [$id , $number]);

    if($init > 0){
        $pra=$_POST['ittd1'];
        mysqli_query($conn," UPDATE studentmarks SET  ittd1 ='$pra' WHERE course = '$id' and admission_number ='$number'");
        $message = "mark updated";
    }
    else{
        $studentmarks  = R::dispense('studentmarks');
        $studentmarks->admission_number=$number;
        $studentmarks->year=date('Y');
        $studentmarks->course=$id;
        $studentmarks->ittd1=$pra;
        $studentmarks  ->date =date('Y-m-d H:i:s');
        R::store($studentmarks );
        $message = "mark Recorded ";
    }
}?>
<?php
require_once('session1.php');
?>
<?php
SESSION_START();
?>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php
                  include("mark_header.php");
                ?>       </ul>
                <br>

            </div>

            <!--*************************************************************************************************************************-->
            <h2 align="center">Record Set 1 marks</h2>   <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Marks for <?php echo  $name;
                                //  echo R::load('course', $idy)->coursename; ?>

                                <label><?php //echo $course->home ?></label></div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">


                                    <form action="" method="POST" enctype="multipart/form-data">
	                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		                                    <div class="form-group">
			                                    <label class="control-label" for="title">Student Name </label>
			                                    <select  name="admission_number" class="select2_single form-control" tabindex="-1" required="required">
                                                    <?php

                                                    $result= mysqli_query($conn,"select * from students WHERE level ='$level' And course_id ='$cos_id'")or DIE('Connection  failed!');

                                                    while ($row= mysqli_fetch_array ($result) ){
                                                        $id=$row['admission_number'];
                                                        ?>
					                                    <option value="<?php echo $row['admission_number']; ?>"><?php echo $row['firstname']." ".$row['lastname']; ?></option>
                                                    <?php } ?>
			                                    </select>
		                                    </div>
	                                    </div>
	                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		                                    <div class="form-group">
			                                    <label class="control-label" for="title">Mark </label>
			                                    <input type="number" name="ittd1" id="d" class="form-control"  value="<?php echo $studentmarks->ittd1 ?>" onkeyup="final()" max="100" >

		                                    </div>
	                                    </div>
<?php   echo $message;    ?>
                                                <input type="submit" name="update" value="Record Marks" class="btn btn-success" >
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--****************************************************************************-->


                <!--****************************************************************************-->


            </div>
        </p>


    </div>

</div>
</div>

<?php

include  "footer.php";
?>
