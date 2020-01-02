<link rel="shortcut icon" type="image/x-icon" href="images/logo%20transparent.png">

<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 20/8/2018
 * Time: 16:37
 */
$conn=mysqli_connect("localhost", "root", "","cadss_db");
include "config.php";
$user_id=$_SESSION['id'];

$user_query=mysqli_query($conn,"SELECT * from students where email = '$user_id'");
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
		<a class="navbar-brand" href="homepage">KPCASS</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Students <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="viewstudents" >Students List </a></li>
                    <?php if (@$_SESSION['role'] == 'student') {  ?>
						<li><a href="upload_assignment">Submit Assignment</a></li>
						<li><a href="view_assignments">View Assignment</a></li>
                    <?php  }else{ ?>
						<li><a href="students">Add Student</a></li>
						<li><a href="viewstudentrecord">View List</a></li>
						<li><a href="upload_assignment">Submit Assignment</a></li>
						<li><a href="view_assignments">View Assignment </a></li>
                    <?php  }
                    ?>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Staff Members <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="viewstaff">Staff Member </a></li>
					<li class="active"><a href="staff">New Staff Member </a></li>
					<li><a href="viewstaff">View List</a></li>
					<li ><a href="add_assignment">Add Assignment</a></li>
					<li><a href="view_uploaded_assignmnts">Submitted Assignments</a></li>
				</ul>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Marks <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="markstep1" >Marks</a></li>
					<li ><a href="markstep1">Select Subject </a></li>
					<li ><a href="markstep2">View Students Performance</a></li><!--
    <li><a href="markstep6.php"> Assignment</a></li>
    <li><a href="markstep7.php">Print Transcript<img src="assets/img/print.png"> </a></li>
    <li><a href="markstep3.php">Enter Marks<img src="assets/img/view2.png"></a></li>-->
					<li><a href="markstep1">Composite Mark Set </a></li>
					<li><a href="markstep4">View Marks </a></li>
					<li ><a href="course_perfomance"> Course Work Performance</a></li>
				</ul>
			</li>
			</li><li><a href="subjects" >Subjects </a></li>
			<li><a href="courses" >Courses </a></li>
			<li><a href="departments" >Departments </a></li>

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
		<ul class="nav navbar-nav navbar-right">

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php if (isset($_SESSION['username'])) {
                        echo "Current user: " . $_SESSION['username'] . " ";
                        $adm = $_SESSION['role'];

                    }

                    ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a></li>
					<li class="divider"></li>

					<?php
                    if (@$_SESSION['role'] == 'student'){
                        ?>
						<li><a href="complete_reg.php?username=<?php echo $user_id ;?>"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>

                    <?php   }
                    if (@$_SESSION['role'] == 'admin'){
                        ?>
						<li><a href="manage_account.php"><i class="fa fa-user fa-lg"></i>&nbsp;View User</a></li>


                    <?php   }
                    if (@$_SESSION['role'] == 'teacher'){
                        ?>
						<li><a href="staff_registration.php?username=<?php echo $user_id ;?>"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>


                    <?php   }
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