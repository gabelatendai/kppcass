
<?php
include 'rb.php';
session_start();
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$id =$_SESSION['id'];
if (isset($_SESSION['role'])){
    @$id_session =$_SESSION['role'];
    $id =$_SESSION['id'];
}
else {
    print ("<script>window.alert('login in first or create account')</script>");
    print ("<script>window.location.assign('index')</script>");
}

if((time() -$_SESSION['last_login_timestamp']) > 300)
{
    print ("<script>window.location.assign('session_logout.php')</script>");

}
else
{
    $_SESSION['last_login_timestamp'] = time();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KppCass</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="bower_components/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<script src="Highcharts-7.1.2/code/highcharts.js"></script>
	<script src="Highcharts-7.1.2/code/modules/exporting.js"></script>
	<script src="Highcharts-7.1.2/code/modules/export-data.js"></script>


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="dashboard" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>C</b>ASS</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>KPP</b>CASS</span>
        </a>
        <?php
            $conn=mysqli_connect("localhost", "root", "","cadss_db");
            $sess_user=$_SESSION['id'];
            $user=mysqli_query($conn,"SELECT * from users where id = '$id'");
            $lec =mysqli_fetch_array($user);
            $usermail=$lec['email'];
           // $user_id=$_SESSION['id'];


            $user_query=mysqli_query($conn,"SELECT * from students where users_id = '$id'");
            $student =mysqli_fetch_array($user_query);
           // $_SESSION['sess_user']=$student['admission_number'];

            ?>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="label label-success"><?php //echo $count; ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 4 messages</li>
							<li>
							</li>
							<li class="footer"><a href="#">See All Messages</a></li>
						</ul>
					</li>
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning"><?php //echo $count; ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li class="footer"><a href="#">View all</a></li>
						</ul>
					</li>
					<!-- Tasks: style can be found in dropdown.less -->
					<li><a href="session_logout"><i class="fa fa-power-off">LogOut</i>&nbsp;</a></li>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="hidden-xs"><?php echo $usermail; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">


                                <p><?php echo $usermail; ?></p>
									<small>Member since Nov. 2012</small>

							</li>


						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
			
				<div class="pull-left info">
					<p><?php echo $usermail; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
                <br>
			</div>
			<!-- search form -->
			<form action="search" method="post" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
										<button class="btn btn-default" name="go" type="submit"><i
													class="fa fa-search"></i></button>
									</span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
            <?php if (@$_SESSION['role'] == 'student') {  ?>
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li class="active treeview">
					<a href="dashboard">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="dashboard"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
					
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-files-o"></i>
						<span> Assignment</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="upload_assignment"><i class="fa fa-circle-o"></i> Submit Assignment</a></li>
						<li><a href="view_assignments"><i class="fa fa-circle-o"></i> View Assignment</a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-table"></i>
						<span> My Marks</span>
						<span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="individual_marks"><i class="fa fa-circle-o"></i> View</a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Account</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">

						<li><a href="session_logout"><i class="fa fa-power-off"></i>&nbsp;Log Out</a></li>

						<li class="divider"></li>
                        <?php
                        if (@$_SESSION['role'] == 'student'){
                            ?>
							<li><a href="complete_reg"><i class="fa fa-user fa-lg"></i>&nbsp;Update Profile</a></li>
	                        <li><a data-toggle="modal" href="#" data-target="#exampleModal"><i class="fa fa-lock fa-lg"></i>
				                        Change Password</a>
	                        </li>
                        <?php   }
                        ?>

						<!--<li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>-->
					</ul>
				</li>
			</ul>
            <?php  }
            elseif(@$_SESSION['role'] == 'lecturer') {  ?>
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li class="active treeview">
					<a href="dashboard">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="dashboard"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-files-o"></i>
						<span>Students</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="students"><i class="fa fa-circle-o"></i> Add Student </a></li>
						<li><a href="viewstudentslist"><i class="fa fa-circle-o"></i> Student List</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-pie-chart"></i>
						<span>Assignment</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="add_assignment"><i class="fa fa-circle-o"></i>Add Assignment</a></li>
						<li><a href="view_uploaded_assignmnts"><i class="fa fa-circle-o"></i>Submitted Assignment</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-laptop"></i>
						<span>Marks</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="markstep1" ><i class="fa fa-circle-o"></i>Record Marks</a></li>
						<li ><a href="markstep2"><i class="fa fa-circle-o"></i>View Students Performance</a></li>
   					<li><a href="markstep1"><i class="fa fa-circle-o"></i>Composite Mark Set </a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Account</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">

						<li><a href="session_logout"><i class="fa fa-power-off"></i>&nbsp;Log Out</a></li>

						<li class="divider"></li>
                        <?php
                        if (@$_SESSION['role'] == 'lecturer'){
                            ?>
							<li><a href="staff_registration"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>
	                        <li><a data-toggle="modal" href="#" data-target="#exampleModal"><i class="fa fa-lock fa-lg"></i>
			                        Change Password</a>
	                        </li>

                        <?php   }
                        ?>

						<!--<li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>-->
					</ul>
				</li>

			</ul>
            <?php }
            else{  ?>
	            <ul class="sidebar-menu" data-widget="tree">
		            <li class="header">MAIN NAVIGATION</li>
		            <li class="active treeview">
			            <a href="dashboard">
				            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
				            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			            </a>
			            <ul class="treeview-menu">
				            <li class="active"><a href="dashboard"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>

			            </ul>
		            </li>
		            <li class="treeview">
			            <a href="#">
				            <i class="fa fa-edit"></i>
				            <span>Departments</span>
				            <i class="fa fa-angle-left pull-right"></i>
			            </a>
			            <ul class="treeview-menu">
				            <li><a href="divisions" ><i class="fa fa-circle-o"></i> Add Division </a></li>
				            <li><a href="departments" ><i class="fa fa-circle-o"></i> Add Departments </a></li>
				            <li><a href="courses" ><i class="fa fa-circle-o"></i> Add Courses </a></li>
				            <li><a href="subjects" ><i class="fa fa-circle-o"></i>  Subjects </a></li>
			            </ul>
		            </li>
		            <li class="treeview">
			            <a href="#">
				            <i class="fa fa-desktop"></i>
				            <span>Students</span>
				            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			            </a>
			            <ul class="treeview-menu">
				            <li><a href="students"><i class="fa fa-circle-o"></i> Add Student </a></li>
				            <li><a href="viewstudents"><i class="fa fa-circle-o"></i> Student List</a></li>
			            </ul>
		            </li>
		            <li class="treeview">
			            <a href="#">
				            <i class="fa fa-files-o"></i>
				            <span>Staff Members</span>
				            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			            </a>
			            <ul class="treeview-menu">
				            <li><a href="staff"><i class="fa fa-circle-o"></i> Add  </a></li>
				            <li><a href="viewstaff"><i class="fa fa-circle-o"></i> Staff List</a></li>
				            <li><a href="staff_subs"><i class="fa fa-circle-o"></i> Staff Subjects</a></li>
			            </ul>
		            </li>

		            <li class="treeview">
			            <a href="#">
				            <i class="fa fa-table"></i>
				            <span>Marks</span>
				            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			            </a>
			            <ul class="treeview-menu">
				            <li><a href="markstep1" ><i class="fa fa-circle-o"></i>Record Marks</a></li>
				            <li ><a href="markstep2"><i class="fa fa-circle-o"></i>View Students Performance</a></li>
				            <li><a href="markstep1"><i class="fa fa-circle-o"></i>Composite Mark Set </a></li>

			            </ul>
		            </li>

		            <li class="treeview">
			            <a href="#">
				            <i class="fa fa-user"></i>
				            <span>Account</span>
				            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			            </a>
			            <ul class="treeview-menu">

				            <li><a href="session_logout"><i class="fa fa-power-off"></i>&nbsp;Log Out</a></li>

				            <li class="divider"></li>
				            <li><a href="manage_account"><i class="fa fa-user fa-lg"></i>&nbsp;View User</a></li>
				            <li><a data-toggle="modal" href="#" data-target="#exampleModal"><i class="fa fa-lock fa-lg"></i>
						            Change Password</a>
				            </li>
			            </ul>
		            </li>
	            </ul>
            <?php }?>
		</section>
		<!-- /.sidebar -->
	</aside>
	<section class="section bg-gray" id="section-modal">
		<div class="container">



			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="post" enctype="multipart/form-data">
								<!-- Form Name -->
								<div class="venue-form-info card-body">
									<div class="row">

										<!-- Text input-->
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
											<div class="form-group">
												<label class="control-label" for="title">Old Password </label>
												<input id="title" name="oldpassword" type="password" placeholder="Old Password" class="form-control " required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
											<div class="form-group">
												<label class="control-label" for="title">New Password </label>
												<input id="title" name="password" type="password" placeholder="New Password" class="form-control " required>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="form-group">
												<label class="control-label" for="address">Confirm Password </label>
												<input id="address" name="cpassword" type="password" placeholder="Confirm Password" class="form-control " required>
											</div>
										</div>
										<!-- Select Basic -->

									</div>
								</div>
								<div class="social-form-info card-body border-top">
									<div class="row modal-footer">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											<button class="btn btn-default" name="update" type="submit">Submit </button>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>


		</div>
	</section>
	<?php


	if (isset($_POST['update'])) {


	$email = $_SESSION['id'];
	//$email = $_POST['email'];
	$oldpassword = md5($_POST['oldpassword']);
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	//$activity = "Log in";
	// $Time = time();
	/*
	----------------------------    gabela ---------------------------------------------*/

	$init = R::findOne('users', 'id = ?', [$email]);

	$pass= $init->password;

	if ($oldpassword != $pass) {
	//   $message = "invalid details";
	echo '<div class="alert alert-danger" role="alert" style="background-color:transparent">...<h2  class="text-center" style="color:white">
			incorrect old password</h2></div>';

	echo '
	<h2 align="center">
		<meta content="2;dashboard" http-equiv="refresh"/>
	</h2> ';
	}else{
if ($cpassword == $password) {
	mysqli_query($conn," UPDATE users SET  password ='$password' WHERE id = '$email'");

	echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2 class="text-center" style="color:cornflowerblue"> <img src="images/492.png" />
			password changed </h2></div>';

	echo '
	<h2 align="center">
		<meta content="2;dashboard" http-equiv="refresh"/>
	</h2> ';
	}else{

    echo '<div class="alert alert-danger" role="alert" style="background-color:transparent">...<h2  class="text-center" style="color:white">
			your passwords does not match  </h2></div>';

    echo '
	<h2 align="center">
		<meta content="2;dashboard" http-equiv="refresh"/>
	</h2> ';
}
    }
	}
