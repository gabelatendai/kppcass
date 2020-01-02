<?php
include "rb.php";

$conn = mysqli_connect("localhost", "root", "", "cadss_db");

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['add'])) {



    $role = $_POST['role'];
    //  $username = $_POST['username'];
    $email = $_POST['email'];
    $init = R::findOne('users', 'email  = ?', [$email]);
    //course Id
    $course_id = $_POST['course_id'];
    $cos_id = R::findOne('courses', 'id  = ?', [$course_id]);
    //department id
    $dep_id=$cos_id->department_id;
    $dpt_id = R::findOne('departments', 'id  = ?', [$dep_id]);
    //divisionId
    $dvsn_id=$dpt_id->division_id;
    $dpt_id = R::findOne('divisions', 'id  = ?', [$dep_id]);

    if ($init > 0) {
        echo "<script>alert('Email already taken by another user!'); window.location='register'</script>";
    } else {


        $users = R::dispense('users');
        $users->email = $email;
        $users->role = $role;
        $users->course_id = $course_id;
        $users->department_id = $dep_id;
        $users->division_id = $dvsn_id;
        $users->password = md5($_POST['password']);
        $users->date = date('Y-m-d H:i:s');
        R::store($users);


        if  (@$role == 'student') {
            $students = R::dispense('students');
            $students->email = $_POST['email'];
            $students->role = $role;
            $students->course_id = $course_id;
            $students->department_id = $dep_id;
            $students->division_id = $dvsn_id;
            $students->date = date('Y-m-d H:i:s');
            $users->ownProductList[] = $students;
            R::store($users);


        } else {
            $staff = R::dispense('staff');
            $staff->email = $_POST['email'];
            $staff->role = $role;
            $staff->department_id = $dep_id;
            $staff->division_id = $dvsn_id;
            $staff->course_id = $course_id;
            $staff->date = date('Y-m-d H:i:s');
            $users->ownProductList[] = $staff;
            R::store($users);

        }

        print ("<script>window.alert('registration was successful')</script>");
        print ("<script>window.location.assign('index')</script>");
       // echo ';

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KPPCASS</title>
    <link rel="stylesheet" type="text/css" href="css/login/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme9.css">
</head>
<body>
    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="img-holder">
	            <div class="bg"></div>
	            <div class="info-holder">
		            <h3>Kushinga Phikelela Polytechnic Continuous Assessment System</h3>
		            <marquee>Welcome to Kushinga Phikelela Polytechnic Continuous Assessment System</marquee>
		            <img src="images/logo.png" alt="">
	            </div>
            </div>
	        <div class="form-holder">
		        <div class="form-content">
			        <div class="form-items">
				        <div class="website-logo-inside">
					        <div class="logo" style="color: white"><img src="images/logo.png">
						        <!--<marquee>KPPCASS</marquee>-->
						        KPPCASS
						        <img src="images/coat.png">
					        </div>
				        </div>
				        <div class="page-links">
					        <a href="index" >Login</a><a class="active" href="register">Register</a>
				        </div>
				        <form class="form-horizontal" action="" method="post">

				        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>

	                        <select class="form-control" name="role"   id="select" required>
			                        <option value="" >Select Role</option>
			                        <option value="lecturer">Lecturer</option>
			                        <option value="hod">Head Of Department</option>
			                        <option value="admin">Principal</option>
			                        <option value="admin">Vice Principal</option>
			                        <option value="exams">Examination Officer</option>
			                        <option value="hofD">Head Of Division</option>
			                        <option value="link">Link Person</option>
			                        <option value="chief">Chief Assessor</option>
			                        <option value="student">Student </option>
	                        </select>
	                        <br>
	                        <select  name="course_id" class=" form-control"  required="required">
			                        <option value="" >Select Course</option>

                                    <?php
                                    $result= R::FindAll('courses');
                                    foreach ($result as $r) {
                                        $id=$r->id;
                                        ?>
				                        <option value="<?php echo $id; ?>"><?php echo $r->coursename; ?></option>
                                    <?php } ?>
	                        </select>
                            <div class="form-button">
                                <button id="submit" name="add" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>