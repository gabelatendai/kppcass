<?php
error_reporting(0);
?>
<?php
SESSION_START();
include "header.php";
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--**************************************************************************************************************************-->
                        <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li class="active"><a href="register_form">New user <img src="assets/img/new.png"> </a></li>
                                  <li><a href="manage_account">View users<img src="assets/img/view2.png"></a></li>
                              
                                </ul>
                            <br>
                            
                        </div>
<!--**************ths is the success msg on saving the cord-->
                
  <!--*************************************************************************************************************************-->
                       
<div class="row">
        <div class="col-sm-3">
        </div>
<div class="col-sm-6" >
                                  <form method="POST" action="" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required/>
                                        </div>

                                      <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/>
                                      </div>

	                                  <div class="form-group">
                                        <select class="form-control" name="role"   id="select" required>
	                                        <option value="" >Select user Type</option>
	                                        <option value="lecturer">Lecturer</option>
	                                        <option value="hod">Head Of Department</option>
	                                        <option value="hofD">Head Of Division</option>
	                                        <option value="principal">Principal</option>
	                                        <option value="vrincipal">V Principal</option>

                    
                  </select>
	                                  </div>

	                                  <div class="form-group">
		                                  <label> Course</label>
	                                  <select  name="course_id" class="select2_single form-control" tabindex="-1" required="required">
                                          <?php
                                          $result= mysqli_query($conn,"select * from courses");
                                          while ($row= mysqli_fetch_array ($result) ){
                                              $id=$row['id'];
                                              ?>
			                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['coursename']; ?></option>
                                          <?php } ?>
	                                  </select>
	                                  </div>
										<br>
										<div class="row-md-5 col-md-offset-6 column">
                                     <button type="submit" id="submit" name="add" class="btn btn-primary">Save</button>
									 <a href="dashboard" class="btn btn-primary">Back</a>
									 </div>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
		<br>
				<br>
				<br>
				<br>
				<br>
				<div class="row-fluid">
				<div class="col-md-3 col-md-offset-1">
												
				
				
				</div></div>
				
				
				
				<div class="row-fluid">
				<div class="col-md-5 col-md-offset-2">
				<h4><span id=tick2>
				</span>&nbsp;

    </div>
    </div>
    </div>
    </div>
    </div>
   
	<?php
	if (isset($_POST['add'])){
	

    $role=$_POST['role'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    
    $init = R::findOne('users', 'email  = ?', [$email]);

    if ($init > 0) {
        echo "<script>alert('Email already taken by another user!'); window.location='register_form'</script>";
    } else {


        $users = R::dispense('users');
        $users->email = $email;
        $users->role = $role;
        $users->course_id = $_POST['course_id'];;
        $users->password = $password;
        $users->date = date('Y-m-d H:i:s');
        R::store($users);

	?>
	<script>
alert('Succsessfully Saved');
window.location = "register_form";
</script>
<?php
}
}
?>
		
		</div>
	
	
	</center>
</div>
<?php
include "footer.php";
?>
