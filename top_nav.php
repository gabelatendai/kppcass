<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 20/8/2018
 * Time: 16:37
 */

include "config.php";
$user_id=$_SESSION['id'];
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
        <a class="navbar-brand" href="homepage.php" style="">KPPCASS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


 <ul class="nav navbar-nav navbar-right">
     <!--
            <li><a href="register_form.php"><i class="fa fa-user fa-lg"></i>&nbsp;Add New User</a></li>
            <li class="divider"></li>
            <li><a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a></li>
            <li class="divider"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"></li>
        </ul> -->
	 <li >
         <?php if (isset($_SESSION['username'])) {
             echo "Current user: " . $_SESSION['username'] . " ";
             $adm = $_SESSION['role'];

         }

         ?>
	 </li>
     <li><a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a></li>
     <li class="divider"></li>   <li class="divider"></li>

	 <?php
     if (@$_SESSION['role'] == 'student'){
     ?>
            <li><a href="complete_reg.php?username=<?php echo $user_id ;?>"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>
            <li class="divider"></li>
  <?php   }
     if (@$_SESSION['role'] == 'admin'){
     ?>
     <li><a href="manage_account.php"><i class="fa fa-user fa-lg"></i>&nbsp;View User</a></li>
     <li class="divider"></li>

     <?php   }
     if (@$_SESSION['role'] == 'teacher'){
     ?>
         <li><a href="staff_registration.php?username=<?php echo $user_id ;?>"><i class="fa fa-user fa-lg"></i>&nbsp;Complete Registration</a></li>
         <li class="divider"></li>

     <?php   }
     ?>

	  <li><a href="homepage.php" >Dashboard</a></li>
                                <li ><a href="viewstudents.php" >Students </a></li>
                                <li><a href="viewstaff.php">Staff Member </a></li>
                                <li><a href="course.php" >Courses </a></li>
                                <li><a href="departments.php" >Departments </a></li>
                                <li><a href="markstep1.php" >Marks </li>
        </ul>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

