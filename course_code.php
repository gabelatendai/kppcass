<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB

?>
<?php
SESSION_START();
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
                        <div class="panel-heading">Add new Course</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 


                          <form action="course_code" method="POST" enctype="multipart/form-data">
                          <h4>Course Details</h4>
                           Course Code
	                          <input type="text" name="course_code" class="form-control">
                            Course Name 
                            <select name="course_id" class="form-control" >
                                                  <?php
                                                $records1=mysqli_query($conn,"SELECT * FROM courses");
                                                    while($row=mysqli_fetch_array($records1))
                                                        {
                                                            ?>
                                                          <option value="<?php echo $row['id'];?>"><?php echo $row['coursename'];?></option>";
                                                        <?php
                                                          }
                                                ?>
                            </select>
                                          <input type="submit" name="add" value="Save Record" class="btn btn-success">

                            </form>
<!--****************************************************************************-->

  <?php
    if (isset($_POST['add'])){

       $coscode = R::dispense('coscode');
       $coscode->course_id =$_POST['course_id'];
       $coscode->course_code = $_POST['course_code'];
       R::store($coscode);


?>
                      
                        
                        <script>
 
                        alert('Succsessfully Saved.');
                        window.location = "course_code";
                        </script>
<?php 
}?> 
 <!--*******************************try add parent's details******************************************************-->  
                        </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                 </div>
	                <div class="col-lg-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading"> Courses Codes</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body"
			                <div class="table-responsive">
				                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

					                <thead>
					                <tr>
						                <th><center>Course ID</center></th>
						                <th><center>Course Name</center></th>
						                <th><center>Course Code</center></th>
						                <th><center>Edit</center></th>
						                <th><center>Delete</center></th>
					                </tr>
					                </thead>
					                <tbody>
                                    <?php
                                    $dep= R::findAll('coscode');
if($dep){
                                    foreach ($dep as $row) {
                                        $course_id = $row->course_id;
                                        $id = $row->id;
                                        $de= R::findOne('courses','id=?',[$course_id]);

                                        ?>
						                <tr>
							                <td><center><?php echo $row->id ?></center></td>
							                <td><center><?php echo $de->coursename ?></center></td>
							                <td><center><?php echo $row->course_code ?></center></td>

							                <td>
								                <center><a href="editcourse.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center>
							                </td>

							                <td><center><a href="deletecoscode<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" name="register"></i>delete</a></center>
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
