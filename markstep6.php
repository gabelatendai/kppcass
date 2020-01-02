
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
    $Sql = "SELECT * FROM marks";
    $result = mysqli_query($db, $Sql);  
 
 
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr>  <th>Student ID</th>
                          <th>Course/Class ID</th>
                          <th>Term</th>
                          <th>Year</th>
                          <th>Exam Series</th>
                          <th>Maths</th>
                          <th>english</th>
                          <th>kiswahili</th>
                          <th>Chemistry</th>
                          <th>Physics/Biology</th>
                          <th>Average</th>
                        </tr></thead><tbody>";

 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['student_id']."</td>
                   <td>" . $row['course_id']."</td>
                   <td>" . $row['term']."</td>
                   <td>" . $row['year']."</td>
                   <td>" . $row['exam_series']."</td>
                   <td>" . $row['maths']."</td>
                   <td>" . $row['english']."</td>
                   <td>" . $row['kiswahili']."</td>
                   <td>" . $row['social_studies']."</td>
                   <td>" . $row['science']."</td>
                   <td>" . $row['average']."</td></tr>";        
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
                                  <li ><a href="markstep1.php">Choose Class <img src="assets/img/new.png"> </a></li>
                                  <li ><a href="markstep2.php">View Students<img src="assets/img/view2.png"></a></li>
                                  <li ><a href="markstep3.php">Enter Marks<img src="assets/img/view2.png"></a></li>
                                  <li><a href="markstep5.php">Criteria <img src="assets/img/delete2.png"></a></li>
                                  <li><a href="markstep4.php">View Marks <img src="assets/img/import.png"></a></li>               
                                  <li  class="active"><a href="markstep6.php">Export/import CSV </a></li>
                                  <li><a href="markstep7.php">Print Transcript <img src="assets/img/print.png"></a></li>
                                </ul>
                            <br>
                            
                        </div>
                </div>
            </div>
        </div>
                        
  <!--*************************************************************************************************************************-->
    <div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="marksfunction.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
    <form class="form-horizontal" action="marksfunction.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
            <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="Exportstudent" class="btn btn-success"  value="Export to excel"/>


                    </div>
            </div>                    
    </form>           
 </div>
<?php
include "footer.php";
?>
