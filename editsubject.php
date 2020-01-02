<?php
error_reporting(0);
$conn=mysqli_connect("localhost", "root", "","cadss_db");
include "header.php";
?>
<?php
SESSION_START();
?>

<?php
require_once('session1.php');
?>
<?php
$id = $_GET['id'];
    $select = mysqli_query($conn,"SELECT * FROM subjects WHERE id ='$id'");
             $rec = mysqli_fetch_array($select);
   
            $id = $rec['id'];
            $course_id = $rec['course_id'];
            $subjectname = $rec['subjectname'];
            $subject_code = $rec['subject_code'];
          //  $duration = "$rec[duration]";
            //$feepayable = "$rec[feepayable]";
              //LOAD PARENT DETAILS TOO
           // $departmentname = "$rec[departmentname]";
           // $hod = "$rec[hod]";
  
       // }}

 
  ?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--**************************************************************************************************************************-->
                         <div class="container" style="width:100%">
                            <?php
                            include 'depheader.php';
                            ?>
                              <!--  <ul class="nav nav-tabs">
                                  <li ><a href="course.php">New Subject<img src="assets/img/new.png"> </a></li>

                                  <li class="active"><a href="editcourse.php">Edit Subject <img src="assets/img/update2.png"> </a></li>
                                  <li><a href="csvtesting.php">Import/Export CSV<img src="assets/img/export.png"></a></li>
                                 <li ><a href="deletecourse.PHP">Delete <img src="assets/img/delete2.png"></a></li>
                                  <li><a href="#">Manage Subjects </a></li>                                 
                                  
                                </ul>-->
                            <br>
                         </div>
                        </div> </div> </div>

                        
  <!--*************************************************************************************************************************-->
   <div class="container-fluid">
       <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Edit Subject</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table"> 

                    <form action="updatecourse.php" method="POST" enctype="multipart/form-data">                         
                        <div style=" position:relative">
                        <h4>Subject Details</h4>

                        <label>Subject ID:</label>
                        <label>Subject Title</label>
                        <input type="text" name="subjectname"  value="<?php echo $subjectname ;?>" class="form-control">
	                        <label>Subject Code</label>
	                        <input type="text" name="subject_code"  value="<?php echo $subject_code ;?>" class="form-control">
                            <label> Subject Level</label>
	                        <select name="level" class="form-control" value="<?php echo $level; ?>" >

		                        <option value="nc">NC</option>
		                        <option value="nd1">ND1</option>
		                        <option value="nd3">ND3</option>
		                        <option value="hnd">HND</option>
	                        </select>
                        <label>Course Code</label>
                        <select id="course_id" name="course_id" value="<?php echo $course_id?>" class="form-control">  
                                            <option></option>
                                                <?php 
                                                    $query=mysqli_query($conn,"select * from coscode");
                                                    while($row=mysqli_fetch_array($query))
                                                     { 
                                                        if($result['id'] == $row['id']){
                                                            $sel = "selected";
                                                        }else{
                                                            $sel = "";
                                                        }
                                                            ?>
                                                        <option value="<?php echo $row['id'];?>" <?=$sel?> > <?php echo $row['course_code'];?> </option>
                                                        <?php 
                                                    } ?>
                                                    </select>
                       
                        <input type="submit" name="register" value="Update" class="btn btn-success">
                        <a button type='button' class="btn btn-primary" href="subject_list">Back</a> <br><br>                           
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
  include "footer.php";
  ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/affix.js"></script>
    <script src="assets/js/alert.js"></script>
    <script src="assets/js/alert1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/bootstrap-wysihtml5.js"></script>
    <script src="assets/js/button.js"></script>
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script src="assets/js/ckeditor.js"></script>
    <script src="assets/js/collapse.js"></script>
    <script src="assets/js/color.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/DT_bootstrap.js"></script>
    <script src="assets/js/dynamic.js"></script>
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dialog.js"></script>
    <script src="assets/js/jquery.hoverdir.js"></script>
    <script src="assets/js/jquery.jgrowl.js"></script>
    <script src="assets/js/jquery.knob.js"></script>
    <script src="assets/js/jquery.uniform.min.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/jquery-1.11.0.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery-ui-1.10.3.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="assets/js/myjquery.js"></script>
    <script src="assets/js/myjquery1.js"></script>
    <script src="assets/js/npm.js"></script>
    <script src="assets/js/popover.js"></script>
    <script src="assets/js/profile.js"></script>
    <script src="assets/js/raphael-min.js"></script>
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/scrollspy.js"></script>
    <script src="assets/js/tab.js"></script>
    <script src="assets/js/tooltip.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/wysihtml5-0.3.0.js"></script>
    <script language="javascript" type="text/javascript">
     $(window).load(function()
      {
        $('#loading').hide();
      });
</script>
</body>

</html>