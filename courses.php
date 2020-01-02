<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

?><?php
if (isset($_POST['register'])){

$password = md5($_POST['password']);
$email = $_SESSION['email'];


$user = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);
    $coursename = $_POST['coursename'];


    $init = R::findOne('courses', 'coursename = ? ', [$coursename]);

if ($user == null) {



    echo "<script>alert('Wrong Password!'); window.location='courses'</script>";

} else {

    if ($init > 0) {
        print ("<script>window.alert('Course already registered !!')</script>");
        print ("<script>window.location.assign('courses')</script>");
    } else {
        $courses = R::dispense('courses');
        $courses->coursename = $coursename;
        $courses->department_id = $_POST['department_id'];
        R::store($courses);


        ?>


		<script>

			alert('Succsessfully Saved.');
			window.location = "courses";
		</script>
    <?php }
}
}?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">
                            
                        <?php 
                        include 'depheader.php';
                        
                        ?>
                            <br>
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
              <div class="container-fluid">
                <div class="row">
                 <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add new Course</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                          <form action="courses" method="POST" enctype="multipart/form-data">
                          <h4>Course Details</h4>
                            
                          Course Name
                            <input type="text" name="coursename" class="form-control">
	                           Department <select name="department_id" class="form-control" >
                                                  <?php
                                                $records1=mysqli_query($conn,"SELECT * FROM departments");
                                                    while($row=mysqli_fetch_array($records1))
                                                        {
                                                            ?>
                                                          <option value="<?php echo $row['id'];?>"><?php echo $row['departmentname'];?></option>";
                                                        <?php
                                                          }
                                                ?>
                                          </select><div style="float:left; margin-top:30px;  position:relative; clear:both;">
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
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                 </div>
	                <div class="col-lg-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading"> Courses</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body"
			                <div class="table-responsive">
				                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

					                <thead>
					                <tr>

						                <th><center>Course Name</center></th>
						                <th><center>Department Name</center></th>
						                <th><center>Division Name</center></th>
						                 <th><center>Edit</center></th>
						                <th><center>Delete</center></th>
					                </tr>
					                </thead>
					                <tbody>
                                    <?php
                                    $dep= R::findAll('courses');
if($dep){
                                    foreach ($dep as $row) {
                                        $id = $row->id;
                                        $dep_id = $row->department_id;
                                        $d= R::findOne('departments','id=?',[$dep_id]);
                                        $dd = $d->division_id;

                                        $dv= R::findOne('divisions','id=?',[$dd]);

                                        ?>
						                <tr>
							                <td><center><?php echo $row->coursename ?></center></td>
							                <td><center><?php echo $d->departmentname ?></center></td>
							                <td><center><?php echo $dv->divisionname ?></center></td>
							                <td>
								                <center><a href="editcourse.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center>
							                </td>

							                <td><center><a href="deletecourse<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" name="register"></i>delete</a></center>
							                </td>

						                </tr>
                                    <?php } 
                                    }?>
					                </tbody>
				                </table>

	                </div>
		              </div>
                <!-- /#page-wrapper -->
            </div>

</div>
</div>
</div>
</div>
</div>



<?php
include("footer.php");
?>
