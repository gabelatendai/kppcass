
  <?php
  //error_reporting(0);
  include('config.php');
  $conn=mysqli_connect("localhost", "root", "","cadss_db");
    if (isset($_POST['register'])){
 

                $staff_id=$_POST['staff_id'];
                $firstname= $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $idno = $_POST['idno'];
                $dateofbirth = $_POST['dateofbirth'];
                $gender = $_POST['gender'];
                $password = $_POST['password'];

                $mobile = $_POST['mobile'];
                //$email = $_POST['email'];
                $address = $_POST['address'];
                $zipcode = $_POST['zipcode'];

                $department_id = $_POST['department_id'];


                $sql2="UPDATE `staff` SET `firstname`='$firstname',`lastname`='$lastname',`idno`='$idno',`dateofbirth`='$dateofbirth',`gender`='$gender',`password`='$password',`mobile`='$mobile',`address`='$address',`zipcode`='$zipcode',`department_id`='$department_id' WHERE `id`=$staff_id";
                
               mysqli_query($conn,$sql2);

?>
<?php

                        $records2=mysqli_query($conn,"SELECT * FROM staff WHERE id='$staff_id'");
                        while($rec=mysqli_fetch_array($records2))
                        {
                        $id = $rec['id'];
                        }?>
                        
                        <script>
                        alert('Record Succsessfully Updated');
                        window.location = "viewstaff";
                        </script>

<?php

}?>