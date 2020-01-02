
<?php

include "rb.php";

$conn = mysqli_connect("localhost", "root", "", "cadss_db");

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['login'])) {
    $_SESSION['last_login_timestamp'] = time();

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $activity = "Log in";
    $Time = time();
    /*
    ----------------------------    gabela ---------------------------------------------*/

    $init = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('index')</script>");


    } else {
        session_start();
        $_SESSION['role'] = $init->role;
        $_SESSION['email'] = $init->email;
        $_SESSION['dvsn'] = $init->division_id;
        $_SESSION['dprt'] = $init->department_id;
        $_SESSION['id']=$init->id;
        $_SESSION['course_id'] = $init->course_id;
        $_SESSION['last_login_timestamp'] = time();

        // $_SESSION['username'] = $init->username;

        $user_id=$init->id;
        $role=$init->role;

        $audit = R::dispense('audit');
        $audit->email = $email;
        $audit->user_id = $user_id;
        $audit->role = $role;
        $audit->activity = 'LogIn';
        $audit->date = date('Y-m-d H:i:s');
        R::store($audit);


        echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:cornflowerblue"> <img src="images/492.png" />
!login successful </h2></div>';

        echo '
          <h2 align="center">
              <meta content="2;dashboard" http-equiv="refresh"/>
          </h2> ';
        /*
        if (@$_SESSION['role'] == 'admin') {

            echo '
        <h2 align="center">
            <meta content="2;admin-dashboard" http-equiv="refresh"/>
        </h2> ';

        } elseif (@$_SESSION['role'] == 'student') {


            echo '
        <h2 align="center">
            <meta content="2;homepage" http-equiv="refresh"/>
        </h2> ';


        } elseif (@$_SESSION['role'] == 'lecturer') {

            echo '
        <h2 align="center">
            <meta content="2;dashboard" http-equiv="refresh"/>
        </h2> ';


        } elseif (@$_SESSION['role'] == 'hod') {

            echo '
        <h2 align="center">
            <meta content="2;dashboard" http-equiv="refresh"/>
        </h2> ';


        } elseif (@$_SESSION['role'] == 'hofD') {

            echo '
        <h2 align="center">
            <meta content="2;dashboard" http-equiv="refresh"/>
        </h2> ';


        }

*/
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
						<a href="index" class="active">Login</a><a href="register">Register</a>
					</div>
					<form class="form-horizontal" action="" method="post">

					<input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
						<input class="form-control" type="password" name="password" placeholder="Password" required>
						<div class="form-button">
							<button id="submit" name="login" type="submit" class="ibtn">Login</button>
						</div>
					</form>
					<div class="other-links">
						<span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/login/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/login/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>