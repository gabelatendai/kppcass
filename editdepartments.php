<?php
error_reporting(0);
$conn=mysqli_connect("localhost", "root", "","cadss_db");
include "header.php";
?>
<?php
SESSION_START();

$id = $_GET['id'];
    $select =mysqli_query( $conn,"SELECT * FROM  departments 
             WHERE id ='$id'");
             $result = mysqli_fetch_array($select);
 //   $qry=mysql_query($select);

  ?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--**************************************************************************************************************************-->
                         <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li ><a href="courses.php">New Course<img src="assets/img/new.png"> </a></li>
	                                <li class="active"><a href="departments.php">New Department<img src="assets/img/new.png"> </a></li>
	                              <!--  <li><a href="editdepartments.php">Edit Department<img src="assets/img/update2.png"> </a></li>
	                                <li><a href="deletedepartment.php">Delete<img src="assets/img/view2.png"></a></li>
-->
                                </ul>
                            <br>
                         </div>
                        </div> </div> </div>

                        
  <!--*************************************************************************************************************************-->
   <div class="container-fluid">
       <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Edit Department</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div style=" position:relative">
                        <h4>Department Details</h4>

                        <label>Department name</label>
                        <input type="text" name="departmentname"  value="<?php echo $result['departmentname'] ;?>" class="form-control">
	                    
                       
                        <input type="submit" name="register" value="Update" class="btn btn-success">
                             </div>
                       </form>
</div>
</div>
</div>
</div>
</div>
   </div>

<!--*************************************PHP CODES TO SAVE THE DATA************************************************-->
       
    
  <?php
  $id = $_GET['id'];
  if (isset($_POST['register'])) {

      $departmentname = $_POST['departmentname'];
      //$course_code = $_POST['course_code'];
      //$hod = $_POST['hod'];


      $sql3 = mysqli_query($conn,"UPDATE departments SET  departmentname ='$departmentname' WHERE id = '$id'");

      ?>

	  <script>
		  alert('Record Succsessfully Updated');
		  window.location = "departments.php?id=<?php echo $id;?>";
	  </script>

      <?php
  }
  include "footer.php";
  ?>
