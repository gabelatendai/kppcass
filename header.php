<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPPCASS</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

	<!-- Bootstrap core CSS -->


    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    <!-- select2 -->
    <link href="css/select/select2.min.css" rel="stylesheet">

	<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- ion_range -->

	<!-- colorpicker -->
    <link href="css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <!-- ion_range --
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link id="bootstrap-style" href="css/slide.css" rel="stylesheet">
    <!-- Bootstrap --
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css
	https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body>
<?php
include 'rb.php';

@session_start();

if (isset($_SESSION['role'])){
    @$id_session =$_SESSION['role'];

}
else {
    print ("<script>window.alert('login in first or create account')</script>");
    print ("<script>window.location.assign('index')</script>");
}

?>
<div class="container body">
        <div class="main_container">
            <?php
            $conn=mysqli_connect("localhost", "root", "","cadss_db");
            $sess_user=$_SESSION['id'];
            $user=mysqli_query($conn,"SELECT * from users where id = '$sess_user'");
            $lec =mysqli_fetch_array($user);
            $user_sess=$lec['id'];
            $usermail=$lec['email'];
            $user_id=$_SESSION['id'];


            $user_query=mysqli_query($conn,"SELECT * from students where users_id = '$sess_user'");
            $student =mysqli_fetch_array($user_query);
            $_SESSION['sess_user']=$student['admission_number'];

            ?>
	        <nav class="navbar navbar-default" role="navigation">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			        </button>
			        <a class="navbar-brand" href="dashboard">KPCASS</a>
		        </div>

		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (@$_SESSION['role'] == 'student') {  ?>
			        <ul class="nav navbar-nav">
				        <li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						        Assignments <b class="caret"></b></a>
					        <ul class="dropdown-menu">

							        <li><a href="upload_assignment">Submit Assignment</a></li>
							        <li><a href="view_assignments">View Assignment</a></li>

					        </ul>
				        </li>
				        <li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						        My Subjects <b class="caret"></b></a>
					        <ul class="dropdown-menu">
						        <li><a href="#">View Subjects</a></li>
						        <li><a href="individual_marks">My Marks</a></li>
					        </ul>
				        </li>



			        </ul>

			        <?php  }
                                 elseif(@$_SESSION['role'] == 'lecturer') {  ?>
	                                <ul class="nav navbar-nav">
		                                <li class="dropdown">
			                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				                                Students <b class="caret"></b></a>
			                                <ul class="dropdown-menu">
				                                <li><a href="viewstudents" >Students List </a></li>
				                                <li><a href="students">Add Student</a></li>
			                                </ul>
		                                </li>
		                                <li class="dropdown">
			                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Assingments <b class="caret"></b></a>
			                                <ul class="dropdown-menu">
				                                <li><a href="add_assignment">Add Assignment</a></li>
				                                <li><a href="view_uploaded_assignmnts">Submitted Assignments</a></li>
			                                </ul>
		                                <li class="dropdown">
			                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marks <b class="caret"></b></a>
			                                <ul class="dropdown-menu">
				                                <li><a href="markstep1" >Record Marks</a></li>
				                                <li ><a href="markstep2">View Students Performance</a></li><!--
    <li><a href="markstep6.php"> Assignment</a></li>
    <li><a href="markstep7.php">Print Transcript<img src="assets/img/print.png"> </a></li>
    <li><a href="markstep3.php">Enter Marks<img src="assets/img/view2.png"></a></li>--
				                                <li><a href="markstep1">Composite Mark Set </a></li>
				                                <li><a href="markstep4">View Marks </a></li>
				                                <li ><a href="course_perfomance"> Course Work Performance</a></li>-->
			                                </ul>
		                                </li>


		                                <!--<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">One more separated link</a></li>
                                            </ul>
                                        </li>-->

	                                </ul>
                                <?php }
                    else {  ?>
	                    <ul class="nav navbar-nav">
                        
		                   
		                    <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 Divisions <b class="caret"></b></a>
			                    <ul class="dropdown-menu">
                                <li><a href="divisions" >Add Division </a></li>
                                <li><a href="departments" >Add Departments </a></li>

								<li><a href="courses" >Add Courses </a></li>
								<li><a href="course_code" >Add Courses Codes </a></li>
                                 <li><a href="subjects" > Subjects </a></li>
			                    </ul>
                            </li>
                            <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				                    Students <b class="caret"></b></a>
			                    <ul class="dropdown-menu">
				                    <li><a href="viewstudents" >Students List </a></li>
				                    <li><a href="students">Add Student</a></li>
			                    </ul>
		                    </li>
		                    <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Staff Members <b class="caret"></b></a>
			                    <ul class="dropdown-menu">

				                    <li><a href="staff">New Staff Member </a></li>
				                    <li><a href="viewstaff">View List</a></li>
				                    <li><a href="staff_subs">Add Staff Subjects </a></li>

			                    </ul>
		                    <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marks <b class="caret"></b></a>
			                    <ul class="dropdown-menu">
				                    <li><a href="markstep1" >Marks</a></li>
				                    <li ><a href="markstep2">View Students Performance</a></li><!--
    <li><a href="markstep6.php"> Assignment</a></li>
    <li><a href="markstep7.php">Print Transcript<img src="assets/img/print.png"> </a></li>
    <li><a href="markstep3.php">Enter Marks<img src="assets/img/view2.png"></a></li>--
				                    <li><a href="markstep1">Composite Mark Set </a></li>
				                    <li><a href="markstep4">View Marks </a></li>
				                    <li ><a href="course_perfomance"> Course Work Performance</a></li>-->
			                    </ul>
		                    </li>
		                   

		                    <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>-->

	                    </ul>
                    <?php }?>
			        <ul class="nav navbar-nav navbar-right">

				        <li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php if (isset($_SESSION['id'])) {
                                    echo "Current user: " . $usermail . " ";
                                    $adm = $_SESSION['role'];

                                }

                                ?> <b class="caret"></b></a>
					        <ul class="dropdown-menu">
						        <li><a href="session_logout"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a></li>
						        <li class="divider"></li>

                                <?php
                                if (@$_SESSION['role'] == 'student'){
                                    ?>
							        <li><a href="complete_reg"><i class="fa fa-user fa-lg"></i>&nbsp;Update Profile</a></li>

                                <?php   }

                                elseif (@$_SESSION['role'] == 'lecturer'){
                                    ?>
							        <li><a href="staff_registration"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>


                                <?php   }
                                else {
                                    ?>
	                                <li><a href="manage_account"><i class="fa fa-user fa-lg"></i>&nbsp;View User</a></li>


                                <?php   }
                                ?>
                                <?php
                                if((time() -$_SESSION['last_login_timestamp']) > 300)
                                {
                                    print ("<script>window.location.assign('session_logout.php')</script>");

                                }
                                else
                                {
                                    $_SESSION['last_login_timestamp'] = time();
                                }
                                ?>

						        <!--<li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>-->
					        </ul>
				        </li>
			        </ul>
		        </div><!-- /.navbar-collapse -->
	        </nav>
           <h2 align="center">Kushinga Phikelela Polytechnic Continuous Assessment System</h2>
 <div class="col-md-12" role="main">
                        <div class="">