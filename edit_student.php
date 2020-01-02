<?php
include "header.php";
$conn=mysqli_connect("localhost", "root", "","cadss_db");
error_reporting(0);
$id = $_GET['id'];
//$id = $_SESSION['sess_user'];
$result = mysqli_query($conn,"SELECT * FROM students WHERE id = '$id' ");
$rec = mysqli_fetch_array($result);
    $admission_number = "$rec[admission_number]";
    $username = "$rec[username]";
    $firstname = "$rec[firstname]";
    $lastname = "$rec[lastname]";
    $idno = "$rec[idno]";
    $dateofbirth = "$rec[dateofbirth]";
    $gender = "$rec[gender]";
    $password = "$rec[password]";
    $level = "$rec[level]";
    $mobile = "$rec[mobile]";
    $email = "$rec[email]";
    $address = "$rec[address]";
    $zipcode = "$rec[zipcode]";
    $course_id = "$rec[department_id]";
    $reg_date = "$rec[reg_date]";
    //LOAD PARENT DETAILS TOO

?>





<?php
SESSION_START();
?>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive">
            <!--**************************************************************************************************************************-->
            <div class="container" style="width:100%">

             <?php include  "stud_header.php"; ?>
                <br>

            </div>
        </div>
    </div>
</div>

<!--*************************************************************************************************************************-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Record</div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div style="float:left;  position:relative">
                                <h4>Personal Details</h4>

                                <label>Adm NO:</label>
                                <input type="text" name="admission_number" readonly  value="<?php echo $admission_number ?>"
                                       class="form-control">
                                <label>Firstname</label>
                                <input type="text" name="firstname" value="<?php echo $firstname ?>"
                                       class="form-control">

                                <label>Last Name</label>
                                <input type="text" name="lastname" value="<?php echo $lastname ?>" class="form-control">
                                <label>ID/Passport NO.</label>
                                <input type="text" name="idno" value="<?php echo $idno ?>" class="form-control">

                                <label>DOB</label>
                                <input type="date" name="dateofbirth" value="<?php echo $dateofbirth ?>"
                                       class="form-control">
                                <label>Gender</label>
                                <select  name="gender" id="gender"  class="form-control" required>
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>

                                </select>

                            </div>
                                <div style="float:right; position:relative">
                                    <h4>Contact Details</h4>
                                    <label>Mobile</label>
                                    <input type="number" name="mobile" value="<?php echo $mobile ?>"
                                           class="form-control">
                                    <label>Address</label>
                                    <input type="text" name="address" value="<?php echo $address ?>"
                                           class="form-control">

                                    <label>Zip Code</label>
                                    <input type="text" name="zipcode" value="<?php echo $zipcode ?>"
                                           class="form-control">


	                                <label>Level</label>
	                                <select  name="level" id="level"  class="form-control" required>
		                                <option value=""></option>
		                                <option value="nc">National Certificate</option>
		                                <option value="nd1">National Diploma 1</option>
		                                <option value="nd2">National Diploma 2</option>
		                                <option value="nd3">National Diploma 3</option>
		                                <option value="hnd"> Higher National Diploma</option>

	                                </select>
	                                <label>Intake</label>
	                                <select  name="intake" id="level"  class="form-control" required>
		                                <option value=""></option>
		                                <option value="0">January</option>
		                                <option value="1">May Intake</option>


	                                </select>
                        </div>
                        <!--this is section three-->
                        <div style="float:left;  position:relative; clear:both;">
                       <br>
                        <input type="submit" name="register" value="Update" class="btn btn-success">
                        </div>
                       </form>
</div>
</div>
</div>
</div>
</div>
</div>

<!--*************************************PHP CODES TO SAVE THE DATA************************************************-->
<?php
if (isset($_POST['register'])) {

    $admission_number = $_POST['admission_number'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $idno = $_POST['idno'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $zipcode = $_POST['zipcode'];
    $mobile = $_POST['mobile'];
    //$email = $_POST['email'];
    $address = $_POST['address'];
    $level = $_POST['level'];
    $intake = $_POST['intake'];
   // $department_id = $_POST['department_id'];




    if ($admission_number==""){
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $n = substr($firstname, 0, 1);
        $m = substr($lastname, 0, 1);

        $e = date('H');
        $d = date('i');
        $t = date('s');

        $date = date('Y-m-d H:i:s');

        $init = '000';

        $admission = $init . $n . $m . $e . $d . $t;

        //mysqli_query($conn,"UPDATE users SET  email ='$email' WHERE id = '$user_id'");


        mysqli_query($conn,"UPDATE students SET `admission_number`='$admission_number',`gender`='$gender',`firstname`='$firstname',`lastname`='$lastname',`idno`='$idno',`dateofbirth`='$dateofbirth',`mobile`='$mobile',`address`='$address',`zipcode`='$zipcode',
                `level`='$level' ,intake='$intake' ,level='$level'
                WHERE `id`='$id'");

        ?>
        <script>
            alert('Record Succsessfully Updated');
            window.location = "viewstudents";
        </script>
        <?php


    } else {

       // mysqli_query($conn, "UPDATE users SET  email ='$email' WHERE id = '$user_id'");

        mysqli_query($conn, "UPDATE students SET   mobile= '$mobile', firstname='$firstname', lastname='$lastname', idno='$idno',dateofbirth='$dateofbirth' ,email='$email', address='$address',
 zipcode='$zipcode ', gender='$gender' ,intake='$intake',level='$level' WHERE id = '$id'");

        ?>
        <script>
            alert('Record Succsessfully Updated');
            window.location = "viewstudents";
        </script>
        <?php

    }
}

include  "footer.php";


?>
