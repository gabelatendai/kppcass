
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
    $Sql = "SELECT * FROM course";
    $result = mysqli_query($db, $Sql);  
 
 
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>Course ID</th>
                          <th>Department ID</th>
                          <th>Course Name</th>
                          <th>exambody</th>
                          <th>duration</th>
                          <th>feepayable</th>
                        </tr></thead><tbody>";
 
 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['course_id']."</td>
                   <td>" . $row['department_id']."</td>
                   <td>" . $row['coursename']."</td>
                   <td>" . $row['exambody']."</td>
                   <td>" . $row['duration']."</td>
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
                                  <li ><a href="departments.php">New Department<img src="assets/img/new.png"> </a></li>
                                  <li ><a href="editdepartments.php">Edit Department<img src="assets/img/update2.png"> </a></li>
                                  <li class="active"><a href="csvdepartments.php">Import/Export CSV<img src="assets/img/delete2.png"></a></li>
                                  <li><a href="deletedepartment.php">Delete<img src="assets/img/view2.png"></a></li>
                                </ul>
                            <br>
                            
                        </div></div></div></div>
                        
  <!--*************************************************************************************************************************-->
    <div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Importcourse" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
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
    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
            <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="Exportcourse" class="btn btn-success" value="export to excel"/>
                    </div>
            </div>                    
    </form>           
 </div>
