<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['register'])){

$password = md5($_POST['password']);
$email = $_SESSION['email'];


$user = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);

$departmentname=$_POST['departmentname'];

$init = R::findOne('departments', 'departmentname  = ?', [$departmentname]);

if ($user == null) {



    echo "<script>alert('Wrong Password!'); window.location='departments'</script>";

} else {


    if ($init > 0) {
        echo "<script>alert('Department already registered'); window.location='departments'</script>";
    } else {

        $departments = R::dispense('departments');
        $departments->departmentname = $departmentname;
        $departments->division_id = $_POST['division_id'];
        R::store($departments);
        // mysqli_query($conn,"INSERT INTO departments(departmentname,course_code, hod) VALUES ('$departmentname','$departmentcode','$hod')") or die(mysql_error());


        ?>


		<script>

			alert('Succsessfully Saved.');
			window.location = "departments";
		</script>
        <?php
    }
}
}
?>

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
                        <div class="panel-heading">Add new Department</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                          <form action="departments.php" method="POST" enctype="multipart/form-data">
                          <h4>Department Details</h4>
                            
                          Department Name
                            <input type="text" name="departmentname" class="form-control">
	                        Division Name
	                          <select name="division_id" class="form-control" >
		                              <?php
                                      $records1=mysqli_query($conn,"SELECT * FROM divisions");
                                      while($row=mysqli_fetch_array($records1))
                                      {
                                          ?>
				                          <option value="<?php echo $row['id'];?>"><?php echo $row['divisionname'];?></option>";
                                          <?php
                                      }
                                      ?>
		                          </select>
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
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                 </div>
	                <div class="col-lg-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Manage Departments</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body"
			                <div class="table-responsive">
				                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

					                <thead>
					                <tr>
						                <th><center>Department Name</center></th>
						                <th><center>Division Name</center></th>

						                <th><center>Edit</center></th>
						                <th><center>Delete</center></th>
					                </tr>
					                </thead>
					                <tbody>
                                    <?php
                                    $dep= R::findAll('departments');
if($dep){
                                    foreach ($dep as $row) {
                                        $divi_id = $row->division_id;
                                        $records1=mysqli_query($conn,"SELECT * FROM divisions WHERE id ='$divi_id'");
                                        $div=mysqli_fetch_array($records1);
                                        $id = $row->id;

                                        ?>
						                <tr>
							                <td><center><?php echo $row->departmentname ?></center></td>
							                <td><center><?php echo $div['divisionname']; ?></center></td>

							                <td>
								                <center><a href="editdepartments<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center>
							                </td>

							                <td><center><a href="deletedepartment<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" name="register"></i>delete</a></center>
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
