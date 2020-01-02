<?php
//error_reporting(0);
include  "header.php";
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
 $email = $_SESSION['id'];
 $init = R::findOne('users', 'id  = ?', [$email]);
 $adm=$init->id;
?>
<?php
require_once('session1.php');
?>
<?php

            // $result = mysqli_fetch_array(mysqli_query($conn,$select));
    $qry=mysqli_query($conn,"SELECT * FROM  staff WHERE users_id='$email'");
        $rec = mysqli_fetch_array($qry);

            $firstname = $rec['firstname'];
            $lastname = $rec['lastname'];
            $idno = $rec['idno'];
            $dateofbirth = $rec['dateofbirth'];
            $gender = $rec['gender'];
            $mobile = $rec['mobile'];
            $email = $rec['email'];
            $address = $rec['address'];
            $zipcode = $rec['zipcode'];
            $id= $rec['id'];

            $department_id = $rec['department_id'];
  ?>

<?php
SESSION_START();
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--**************************************************************************************************************************-->
                        <div class="container" style="width:100%">
                            <?php

                            include  "staff_header.php";
                            ?>
                            <br>

                        </div></div></div></div>
<!--**************ths is the success msg on saving the cord-->
                
  <!--*************************************************************************************************************************-->
                       
<div class="container-fluid">
       <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Edit </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 

                       <form action="" method="POST" enctype="multipart/form-data">
                                                  
                                <div style="float:left;  position:relative">
	                                <h4>My Email</h4>
	                                <input type="text" name="staff_id"  readonly value="<?php echo $email?>" class="form-control">

	                                <h4>Personal Details</h4>
                                <input type="hidden" name="staff_id"  readonly value="<?php echo $id?>" class="form-control">

                                <label>Firstname</label>
                                <input type="text" name="firstname" value="<?php echo $firstname?>" id="sfname" class="form-control" >
                              
                                <label>Last Name</label>
                                <input type="text" name="lastname" value="<?php echo $lastname?>" id="slname" class="form-control" >
                                    <label>ID/Passport NO.</label>
                                 <input type="text" name="idno" class="form-control" value="<?php echo $idno?>" >
                                <label>DOB</label>
                                <input type="date" name="dateofbirth" required class="form-control" max="2010-12-31" value="<?php echo $dateofbirth?>">
                                <label>Gender</label>
                                <select name="gender" class="form-control" class="form-control" value="<?php echo $dateofbirth?>"> 
                                                  <option value="male">Male</option>
                                                  <option value="female">Female</option>
                                          </select>
                                
                                <label> Course</label>
                                <select id="department_id" name="department_id" value="<?php echo $department_id?>" class="form-control">  
                                            <option></option>
                                                <?php 
                                                    $query=mysqli_query($conn,"select * from courses");
                                                    while($row=mysqli_fetch_array($query))
                                                     { 
                                                        if($result['id'] == $row['id']){
                                                            $sel = "selected";
                                                        }else{
                                                            $sel = "";
                                                        }
                                                            ?>
                                                        <option value="<?php echo $row['id'];?>" <?=$sel?> > <?php echo $row['coursename'];?> </option>
                                                        <?php 
                                                    } ?>
                                                    </select>

                                </div>
                                <!--section two-->
                                <div style="float:right; position:relative">
                                <h4>Contact Details</h4>
                                                           
                                <label> Mobile</label>
                                <input type="number" name="mobile" required class="form-control" value="<?php echo $mobile?>">
                                <label> Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $address?>">
                               
                                <label> Zip Code</label>
                                <input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode?>">


                                </textarea>
                                </div>                               
                                <!--this is section three-->
                                <div style="float:left;  position:relative; clear:both;"><br>                           
                                                               
                               
                               <input type="submit" name="register" value="Save Record" class="btn btn-success"><br><br>
                                </div>                               
                        </form>
</div>
</div>
</div>
</div>
</div></div>

<!--*************************************PHP CODES TO SAVE THE DATA************************************************-->


<?php
if (isset($_POST['register'])){


    $staff_id=$_POST['staff_id'];
    $firstname= $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $idno = $_POST['idno'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
     $mobile = $_POST['mobile'];
    //$email = $_POST['email'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];

    $department_id = $_POST['department_id'];


    mysqli_query($conn,"UPDATE `staff` SET `firstname`='$firstname',`lastname`='$lastname',`idno`='$idno',`dateofbirth`='$dateofbirth',`gender`='$gender',`mobile`='$mobile',`address`='$address',`zipcode`='$zipcode',`department_id`='$department_id' WHERE `id`='$staff_id'");

    ?>
    <?php

    $records2=mysqli_query($conn,"SELECT * FROM staff WHERE id='$staff_id'");
    while($rec=mysqli_fetch_array($records2))
    {
        $id = $rec['id'];
    }?>

	<script>
		alert('Record Succsessfully Updated');
		window.location = "staff_registration<?php echo '?id='. $id;?>";
	</script>

    <?php

}


include  "footer.php";
?>
