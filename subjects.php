<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

    if (isset($_POST['register'])) {

//mysqli_query($conn,"UPDATE staff SET  course_id ='1' , division_id ='1'");


        $password = md5($_POST['password']);
        $email = $_SESSION['email'];


        $user = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);
        if ($user == null) {


            echo "<script>alert('Wrong Password!'); window.location='subjects'</script>";

        } else {


            $course_id = $_POST['department_id'];
            $xx = $_POST['id'];
            $sql = "SELECT * FROM courses WHERE coursename='$xx'";
            $user_query = mysqli_query($conn, $sql) or die("error getting data");
            while ($row = mysqli_fetch_array($user_query, MYSQL_ASSOC)) {
                $department_id = $row['id'];
            }

            $coursename = $_POST['coursename'];

            $course_code = $_POST['course_code'];
            $date = date('Y-m-d H:i:s');

            //course Id

            $cos_id = R::findOne('courses', 'id  = ?', [$course_id]);
            //department id
            $dep_id = $cos_id->department_id;
            $dpt_id = R::findOne('departments', 'id  = ?', [$dep_id]);
            //divisionId
            $dvsn_id = $dpt_id->division_id;
            $dpt_id = R::findOne('divisions', 'id  = ?', [$dep_id]);


            $subjects = R::dispense('subjects');
            $subjects->course_id = $course_id;
            $subjects->department_id = $dep_id;
            $subjects->division_id = $dvsn_id;
            $subjects->subjectname = $coursename;
            $subjects->subject_code = $course_code;
            $subjects->level = $_POST['level'];
            R::store($subjects);
            //  echo '<img src="images/492.png" /> &nbsp;! subject information saved successfully';


            // mysql_query("INSERT INTO course(department_id,coursename ) VALUES ('$department_id','$coursename')") or die(mysql_error());

            ?>

		    <script>

			    alert('Subject Succsessfully Saved.');
			    window.location = "subject_list";
		    </script>
        <?php }
    }
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
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
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add new Subject</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                        <form action="" method="POST" enctype="multipart/form-data">
                        <h4>Subject Details</h4>                          
                        <label>Subject Title</label>
                        <input type="text" name="coursename" class="form-control" required>
	<br>
	                        <label>Subject Code</label>
	                        <input type="text" name="course_code" class="form-control" required>
	                        <br>

	                        <label> Subject Level</label>
	                        <select name="level" class="form-control" required>

		                        <option value="nc">NC</option>
		                        <option value="nd1">ND1</option>
		                        <option value="nd2">ND2</option>
		                        <option value="nd3">ND3</option>
		                        <option value="hnd">HND</option>
	                        </select>
                        <label> Course Code</label>
                        <select name="department_id" class="form-control" required>
                                             <?php
                                                $records1=mysqli_query($conn,"SELECT * FROM coscode");
                                                    while($row=mysqli_fetch_array($records1))
                                                       {
                                                           $cosid=$row['course_id'];
                                                         $r=mysqli_query($conn,"SELECT * FROM courses WHERE id ='$cosid'");
                                                            $cos=mysqli_fetch_array($r);

                                                                ?>
	                        <option value="<?php echo $row['id'];?>" ><?php echo $cos['coursename'].'     ' .$row['course_code'];?></option>
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
</div>
</div>
     </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                 </div>
                <!-- /#page-wrapper -->
            </div>
                    <form action="course.php" method="POST" enctype="multipart/form-data" name="upload_excel" class="form-horizontal">
                                    <div class="table-responsive">
                                   <!-- <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    
                                        <thead>
                                          <tr>
                                                <th></th>
                                                <th><center>Course Level</center></th>
                                                <th><center>Course Name</center></th>


                                                <th><center>Edit</center></th>
                                                <th><center>Delete</center></th>
                                                <script src="assets/js/jquery.dataTables.min.js"></script>
                                                <script src="assets/js/DT_bootstrap.js"></script>
                                                <th></th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                <?php /*
                                $sql ="SELECT  * from course";
                                $user_query=mysqli_query($db,$sql) or die("error getting data");
                                while($row = mysqli_fetch_array($user_query, MYSQL_ASSOC)){
                                $id = $row['id'];
                  
                                 ?>
                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="radio" value="<?php echo $id; ?>">
                                                </td>
                                                <td><center><?php echo $row['level']; ?></center></td>
                                                <td><center><?php echo $row['coursename']; ?></center></td>
                                                
                                                <td>
                                                <center><a href="editcourse.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit" name="register"></i>Edit</a></center></td>
                                              
                                                <td><center><a href="deletecourse.php <?php //echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" name="register"></i>delete</a></center></td>
                                               
                                            
                                                </tr>
                                                <?php } */ ?>
                                        </tbody>
                                    </table>-->
                                </form>
                            </div><br>
                         
    
<?php
include "footer.php";
?>
