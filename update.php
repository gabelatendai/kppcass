
  <?php
  //error_reporting(0);
  include('config.php');
  $conn=mysqli_connect("localhost", "root", "","cadss_db");
    if (isset($_POST['register'])) {

        $admission_number = $_POST['admission_number'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $idno = $_POST['idno'];
        $dateofbirth = $_POST['dateofbirth'];
        // $gender = $_POST['gender'];

        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $department_id = $_POST['department_id'];



        if (empty($admission_number)) {
            $firstname = $_REQUEST['firstname'];
            $lastname = $_REQUEST['lastname'];
            $n = substr($firstname, 0, 1);
            $m = substr($lastname, 0, 1);

            $e = date('H');
            $d = date('i');
            $t = date('s');

            $date = date('Y-m-d H:i:s');

            $init = '000';

            $admission_number = $init . $n . $m . $e . $d . $t;



            mysqli_query($conn,"UPDATE `students` SET `username`='$username',`admission_number`='$username',`firstname`='$firstname',`lastname`='$lastname',`idno`='$idno',`dateofbirth`='$dateofbirth',`mobile`='$mobile',`email`='$email',`address`='$address',
                `department_id`='$department_id' 
                WHERE `id`='$id'");

            ?>
            <script>
                alert('Record Succsessfully Updated');
                window.location = "viewstudents.php?id=<?php echo $id;?>";
            </script>
            <?php


        } else {


            mysqli_query($conn,"UPDATE `students` SET `username`='$username',`firstname`='$firstname',`lastname`='$lastname',`idno`='$idno',`dateofbirth`='$dateofbirth',`mobile`='$mobile',`email`='$email',`address`='$address',
                `department_id`='$department_id' 
                WHERE `id`='$id'");

            ?>
            <script>
                alert('Record Succsessfully Updated');
                window.location = "viewstudents.php?id=<?php echo $id;?>";
            </script>
            <?php

        }
    }
?>