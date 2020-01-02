
<?php
error_reporting(0);//turning off error reporting
include("header.php");
?>
<?php
SESSION_START();
?>

<?php

function get_all_records(){
    include('connect.php');
    $Sql = "SELECT * FROM studentstable";
    $result = mysqli_query($db, $Sql);  
 
 
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr>  <th>Admission No.</th>
                          <th>Sirname</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>ID#</th>
                          <th>DOB</th>
                          <th>Gender</th>
                          <th>Country ID</th>
                          <th>County ID</th>
                          <th>Constituency ID</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Zip code</th>
                          <th>Course ID</th>
                          <th>Fee Balance</th>
                        </tr></thead><tbody>";


 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['admission_number']."</td>
                   <td>" . $row['sirname']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['idno']."</td>
                   <td>" . $row['dateofbirth']."</td>
                   <td>" . $row['gender']."</td>
                   <td>" . $row['country_id']."</td>
                   <td>" . $row['county_id']."</td>
                   <td>" . $row['constituency_id']."</td>
                   <td>" . $row['mobile']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['address']."</td>
                   <td>" . $row['zipcode']."</td>
                   <td>" . $row['course_id']."</td>
                   <td>" . $row['feepayable']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
?>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--******************************Second tab section**********************************************-->
                         <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li ><a href="students.php">New Student <img src="assets/img/new.png"> </a></li>
                                  <li><a href="viewstudentrecord.php">View List<img src="assets/img/view2.png"></a></li>
                                  <li><a href="viewstudentsedit1.php">Edit Student<img src="assets/img/view2.png"></a></li>
                                  <li class="active"><a href="csvstudents.php">Import/Export Data <img src="assets/img/import.png"></a></li>
                                  <li><a href="reports_students.php">Reports </a></li>
                                </ul>
                            <br>
                            
                        </div></div></div></div>
                        
  <!--*************************************************************************************************************************-->
    <div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="studentsfunctions.php" method="post" name="upload_excel" enctype="multipart/form-data">


                    <fieldset>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File.</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Importstudent" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
 
            </div>
 <!--function to display all the available records-->           
            <?php
               get_all_records();
            ?>
        </div>
    </div>
<!--exporting data******************************************-->

<div>
    <form class="form-horizontal" action="studentsfunctions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
            <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="Exportstudent" class="btn btn-success"  value="Export to excel"/>


                    </div>
            </div>                    
    </form>           
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