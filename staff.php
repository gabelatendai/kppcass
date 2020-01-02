<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
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
                                include 'staff_header.php';
                                ?>
                            <br>
                            
                        </div>
<!--**************ths is the success msg on saving the cord-->
                
  <!--*************************************************************************************************************************-->
                       
<div class="container-fluid">
       <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add new Staff Member</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 

                       <form action="staff.php" method="POST" enctype="multipart/form-data">
                                                  
                                <div style="float:left;  position:relative">
                                <h4>Personal Details</h4>

                             
                                <label>Firstname</label>
                                <input type="text" name="firstname"  id="sfname" class="form-control" >
                              
                                <label>Last Name</label>
                                <input type="text" name="lastname"  id="slname" class="form-control">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="password" class="form-control" />

                                    <label>ID/Passport NO.</label>
                                 <input type="text" name="idno" class="form-control" >
                                <label>DOB</label>
                                <input type="date" name="dateofbirth" required class="form-control" max="2010-12-31">
                                <label>Gender</label>
                                <select name="gender" class="form-control" class="form-control"> 
                                                  <option value="male">Male</option>
                                                  <option value="female">Female</option>
                                          </select> 

                                
                                <label> Course</label>
                                    <select  name="department_id" class="select2_single form-control" tabindex="-1" required="required">
                                        <?php
                                       $result= mysqli_query($conn,"select * from courses");
                                        while ($row= mysqli_fetch_array ($result) ){
                                            $id=$row['id'];
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['coursename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!--section two-->
                                <div style="float:right; position:relative">
                                <h4>Contact Details</h4>
                                                           
                                <label> Mobile</label>
                                <input type="number" name="mobile" required class="form-control">
                                <label> Email</label>
                                <input type="email" name="email" class="form-control"> 

                                <label> Address</label>
                                <input type="text" name="address" class="form-control">
                               
                                <label> Zip Code</label>
                                <input type="text" name="zipcode" class="form-control">

                                    <label> Roles</label>
                                    <select class="form-control" name="role"   id="select" required>
                      <option value="" >Select user Type</option>
	                                    <option value="lecturer">Lecturer</option>
	                                    <option value="hod">Head Of Department</option>
	                                    <option value="admin">Principal</option>
	                                    <option value="admin">Vice Principal</option>
	                                    <option value="exams">Examination Officer</option>
	                                    <option value="dvsn">Head Of Division</option>
	                                    <option value="link">Link Person</option>
	                                    <option value="chief">Chief Assessor</option>
                    
                  </select>

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
</div>
</div>
</div>

<!--*************************************PHP CODES TO SAVE THE DATA************************************************-->
<?php

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');


    if (isset($_POST['register'])){

$email= $_POST['email'];

$init = R::findOne('staff', 'email  = ?', [$email]);
        //course Id
        $course_id = $_POST['department_id'];
        $cos_id = R::findOne('courses', 'id  = ?', [$course_id]);
        //department id
        $dep_id=$cos_id->department_id;
        $dpt_id = R::findOne('departments', 'id  = ?', [$dep_id]);
        //divisionId
        $dvsn_id=$dpt_id->division_id;
        $dpt_id = R::findOne('divisions', 'id  = ?', [$dep_id]);

if ($init > 0) {

    echo "<script>alert(' email already exist!'); window.location='staff'</script>";

}else {
    $users = R::dispense('users');
    $users->email = $_POST['email'];
    $users->role = $_POST['role'];;
    $users->course_id = $course_id;
    $users->department_id = $dep_id;
    $users->division_id = $dvsn_id;
    $users->password = md5($_POST['password']);
    $users->date = date('Y-m-d H:i:s');
    R::store($users);


    $staff = R::dispense('staff');
    $staff->firstname = $_POST['firstname'];
    $staff->lastname = $_POST['lastname'];
    $staff->idno = $_POST['idno'];
    $staff->dateofbirth = $_POST['dateofbirth'];
    $staff->gender = $_POST['gender'];
    $staff->mobile = $_POST['mobile'];
    $staff->email = $email;
    $staff->address = $_POST['address'];
    $staff->zipcode = $_POST['zipcode'];
    $staff->course_id = $course_id;
    $staff->department_id = $dep_id;
    $staff->division_id = $dvsn_id;
    $staff->role = $_POST['role'];
    $staff->date = date('Y-m-d H:i:s');
    $users->ownProductList[] = $staff;
    R::store($users);





    ?>

	<script>

		alert('Succsessfully Save.');
		window.location = "viewstaff";
	</script>
    <?php

}
}?>

                </div>
                </p>


            </div>
            </div>
            
        </div>
    </div>
    </div>

<?php
include "footer.php";
?>
