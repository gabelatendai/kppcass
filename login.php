
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="build/css/bootstrap.min.css" rel="stylesheet">
    <link href="build/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/style.css" rel="stylesheet">
  </head>
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
          print ("<script>window.location.assign('login')</script>");


      } else {
          session_start();
          $_SESSION['role'] = $init->role;
         $_SESSION['dvsn'] = $init->division_id;
         $_SESSION['dprt'] = $init->department_id;
          $_SESSION['id']=$init->id;
          $_SESSION['course_id'] = $init->course_id;
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
  <body>

    <div class="container">

      <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-4">



          <div class="flip">
        <div class="card"> 
          <div class="face front"> 
              


            <div class="panel panel-default">

              <form class="form-horizontal" action="" method="post">
                
                <br>

                <h1 class="text-center">LOGIN</h1>

                <br>
                <div class="form-group has-feedback">
                <input class="form-control" placeholder="email" type="email" name="email" required/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
                <input class="form-control" placeholder="Password" type="password" name="password" required/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
                <p class="text-right"><a href="">Forgot Password</a></p>
                <button name="login" class="btn btn-primary btn-block">LOG IN</button>
                  <hr>
                <p class="text-center">
                  <a href="#" class="fliper-btn">Create new account?</a>
                </p>
              </form>

            </div>


          </div> 
          <div class="face back"> 
            

              <div class="panel panel-default">

              <form class="form-horizontal" action="" method="post">
                
                <br>

                <h1 class="text-center">Register</h1>

                <br>
                <label>Enter Your Information</label>
      <div class="form-group has-feedback">
                <input class="form-control" placeholder="Email" name="email" type="email" required/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Password" name="password" type="password" required/>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
                  <select class="form-control" name="role"   id="select" required>
                      <option value="" >Select Role</option>
                      <option value="lecturer">Lecturer</option>
                      <option value="hod">Head Of Department</option>
                      <option value="hofD">Head Of Division</option>
                      <option value="student">Student </option>
                  </select>
      </div>
      <div class="form-group has-feedback">
                  <select  name="course_id" class="select2_single form-control" tabindex="-1" required="required">
                  <option value="" >Select Course</option>
                     
                                       <?php
                                        $result= R::FindAll('courses');
                                        foreach ($result as $r) {
                                            $id=$r->id;
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $r->coursename; ?></option>
                                        <?php } ?>
                                    </select>
      </div>
                  <button  name="add" type="submit" class="btn btn-primary btn-block">SIGN UP</button>
                <p class="text-center">
                  <a href="#" class="fliper-btn">Already have an account?</a>
                </p>
                
              </form>

            </div>




          </div>
        </div>   
      </div>
<?php

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
                    echo "<script>alert('Email already taken by another user!'); window.location='login'</script>";
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


                    echo 'registration was successful';

                }
            }
?>
        </div>
        <div class="col-md-4"></div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script>

    $('.fliper-btn').click(function(){
    $('.flip').find('.card').toggleClass('flipped');

});
    </script>
  </body>
</html>




      