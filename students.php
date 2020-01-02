<?php
//error_reporting(0);//turning off error reporting
include("header.php");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$conn=mysqli_connect("localhost", "root", "","cadss_db");

?>
<?php


if (isset($_POST['register'])) {

    $password = md5($_POST['password']);
    $email = $_SESSION['email'];


    $user = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);


    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $n = substr($firstname, 0, 1);
    $m = substr($lastname, 0, 1);

    $e = date('H');
    $d = date('i');
    $t = date('s');

    $date = date('Y-m-d H:i:s');

    $init = '000';

    $admission_number = $init . $n . $m . $e . $d . $t;


    $monthh = strtotime('date()');
    $mon = date('Y-m-d', $monthh);

    $init = R::findOne('students', 'email  = ?', [$email]);
    //course Id
    $course_id = $_POST['course_id'];
    $cos_id = R::findOne('courses', 'id  = ?', [$course_id]);
    //department id
    $dep_id = $cos_id->department_id;
    $dpt_id = R::findOne('departments', 'id  = ?', [$dep_id]);
    //divisionId
    $dvsn_id = $dpt_id->division_id;
    $dpt_id = R::findOne('divisions', 'id  = ?', [$dep_id]);


    if ($user == null) {



            echo "<script>alert('Wrong Password!'); window.location='students'</script>";

        } else{

        if ($init == null) {
            $users = R::dispense('users');
            $users->email = $email;
            $users->role = 'student';
            $users->course_id = $course_id;
            $users->department_id = $dep_id;
            $users->division_id = $dvsn_id;
            $users->password = md5($_POST['password']);
            $users->date = date('Y-m-d H:i:s');
            R::store($users);


            $students = R::dispense('students');
            $students->firstname = $firstname;
            $students->lastname = $lastname;
            $students->admission_number = $admission_number;
            $students->idno = $_POST['idno'];
            $students->dateofbirth = $_POST['dateofbirth'];
            $students->course_id = $course_id;
            $students->department_id = $dep_id;
            $students->division_id = $dvsn_id;
            $students->gender = $_POST['gender'];
            $students->mobile = $_POST['mobile'];
            $students->role = 'student';
            $students->email = $email;
            $students->address = $_POST['address'];
            $students->level = $_POST['level'];
            $students->intake = $_POST['intake'];
            $students->zipcode = $_POST['zipcode'];
            $students->date = date('Y-m-d H:i:s');
            $users->ownProductList[] = $students;
            R::store($users);


            echo "<script>alert('Student successfully added!'); window.location='students'</script>";


        } else {


            echo "<script>alert('Student already exist!'); window.location='students'</script>";
 
        }

    }

}
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--**************************************************************************************************************************-->
                        <div class="container" style="width:100%">
                            <?php
                            include "stud_header.php";
                            ?>

                            <br>
                            
                        </div>
<!--**************ths is the success msg on saving the cord-->
                
  <!--*************************************************************************************************************************-->
<div class="container-fluid">
       <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add new student</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 

                       <form action="students.php" method="POST" enctype="multipart/form-data">
                                <div style="float:left;  position:relative">
                                <h4>Personal Details</h4>
                               <label>Firstname</label>
                                <input type="text" name="firstname" placeholder="Enter your first name" id="sfname" class="form-control" required>
                              
                                <label>Last Name</label>
                                <input type="text" name="lastname" placeholder="last name" id="slname" class="form-control">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="password" value="00000000" readonly id="ssname" class="form-control" required>
                                    <label>ID/Passport NO.</label>
                                 <input type="text" name="idno" class="form-control" placeholder="optional" required>
                                <label>DOB</label>
                                <input type="date" name="dateofbirth" required class="form-control" max="2010-12-31">
                                <label>Gender</label>
                                <select  name="gender" id="gender"  class="form-control" required>
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>

                               </select>


                                </div>
                                <!--section two-->
                                <div style="float:right; position:relative">
                                <h4>Contact Details</h4>
                                                           
                                <label> Mobile</label>
                                <input type="number" name="mobile"  class="form-control" required>
                                <label> Email</label>
                                <input type="email" name="email" class="form-control" placeholder="xyz@gmail.com" required>

                                <label> Address</label>
                                <input type="text" name="address" class="form-control" required>

                                <label> Zip Code</label>
                                <input type="text" name="zipcode" class="form-control" required>
                                    <label>Course <span class="required" style="color:red;">*</span>
                                    </label>

                                    <select  name="course_id" class="select2_single form-control" tabindex="-1" required="required">
                                        <?php
                                        $result= mysqli_query($conn,"select * from courses");
                                        while ($row= mysqli_fetch_array ($result) ){
                                            $id=$row['id'];
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['coursename']; ?></option>
                                        <?php } ?>
                                    </select>
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
		                                <option value="0">January Intake</option>
		                                <option value="1">May Intake</option>
		                            

	                                </select>
                                </div><br><br>
                                <!--this is section three-->
                                <div style="float:left; margin-top:30px;  position:relative; clear:both;">
	                                <button data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-success">Save Record</button>


                                </div>

	                       <section class="" id="section-modal">
		                       <div class="container">



			                       <!-- Modal -->
			                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				                       <div class="modal-dialog" role="document">
					                       <div class="modal-content">
						                       <div class="modal-header">
							                       <h5 class="modal-title" id="exampleModalLabel">Please Enter Password</h5>
							                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                       <span aria-hidden="true">&times;</span>
							                       </button>
						                       </div>
						                       <div class="modal-body">
							                       <!--  <form action="" method="post" enctype="multipart/form-data">
                                                        Form Name -->
								                       <div class="venue-form-info card-body">
									                       <div class="row">

										                       <!-- Text input-->
										                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											                       <div class="form-group">
												                       <label class="control-label" for="title"> Password </label>
												                       <input id="title" name="password" type="password" placeholder=" Password" class="form-control " required>
											                       </div>
										                       </div>
									                       </div>
								                       </div>
								                       <div class="social-form-info card-body border-top">
									                       <div class="row modal-footer">
										                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											                       <button class="btn btn-default" name="register" type="submit">Submit </button>
										                       </div>
									                       </div>
								                       </div>

						                       </div>
					                       </div>
				                       </div>
			                       </div>


		                       </div>
	                       </section>
                        </form></div>
</div>
</div>
</div>
</div>
</div>


<!--**********************************************************************************************************************-->
             

                </div>
                </p>


            </div>
            
        </div>
    </div>
<?php
include "footer.php";
?>
