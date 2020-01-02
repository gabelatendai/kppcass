<?php
error_reporting(0);
$conn=mysqli_connect("localhost", "root", "","cadss_db");
include "header.php";
?>
<?php
SESSION_START();

$id = $_GET['id'];
    $select =mysqli_query( $conn,"SELECT * FROM  courses 
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
                                  <li ><a href="subjects">New Subjects<img src="assets/img/new.png"> </a></li>
	                                <li class="active"><a href="departments">New Course<img src="assets/img/new.png"> </a></li>
	                                <li><a href="editdepartments">Edit Department<img src="assets/img/update2.png"> </a></li>
	                                <li><a href="deletedepartment">Delete<img src="assets/img/view2.png"></a></li>

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
                        <h4>Course Details</h4>

                        <label>Course name</label>
                        <input type="text" name="departmentname"  value="<?php echo $result['coursename'] ;?>" class="form-control">
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
                       
                        <input type="submit" name="update" value="Update" class="btn btn-success">
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
  if (isset($_POST['update'])) {

      $coursename = $_POST['departmentname'];
      $department_id = $_POST['department_id'];
      //$hod = $_POST['hod'];


      $sql3 = mysqli_query($conn,"UPDATE courses SET  coursename ='$coursename' , department_id ='$department_id' WHERE id = '$id'");

      ?>

	  <script>
		  alert('Record Succsessfully Updated');
		  window.location = "courses.php";
	  </script>

      <?php
  }
  include "footer.php";
  ?>