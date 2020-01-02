<?php
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>
<?php
SESSION_START();
?>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                        <div class="container" style="width:100%">
                            
                                <ul class="nav nav-tabs">
                                  <li ><a href="markstep1.php">Choose Class <img src="assets/img/new.png"> </a></li>
                                  <li ><a href="markstep2.php">View Students<img src="assets/img/view2.png"></a></li>
                                  <li ><a href="markstep3.php">Enter Marks<img src="assets/img/view2.png"></a></li>
                                  <li class="active"><a href="markstep5.php">Criteria <img src="assets/img/delete2.png"></a></li>
                                  <li><a href="markstep4.php">View Marks <img src="assets/img/import.png"></a></li>
                                  
                                  <li><a href="markstep6.php">Export/import CSV </a></li>
                                  <li><a href="markstep7.php">Print Transcript <img src="assets/img/print.png"></a></li>
                                </ul>
                            <br>
                            
                        </div>
                        
  <!--*************************************************************************************************************************-->
 
<h4><center><h4><strong>View Marks according to the respective Classes</strong></h4></center></h4>
         
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                     <div class="col-sm-6" >


                        <form method="get" action="markstep4.php">

                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">                                      
                                        <tr>
                                            <td>
                                                <label>Class</label>
                                            </td>
                                            <td>
                                                <select name="id" class="form-control">
                                                <?php
                                                    include('connect.php');
                                                    $sql1="SELECT * FROM course WHERE course_id!=5";
                                                    $records1=mysqli_query($db,$sql1);
                                                        while($row=mysqli_fetch_array($records1,MYSQL_ASSOC))
                                                            {
                                                                echo "<option>".$row['course_id']."</option>";
                                                            
                                                            }
                                                    ?> </select>
                                            </td>
                                            <td>
                                                <label>Term</label>
                                            </td>
                                            <td>
                                                <select name="term" class="form-control">
                                                    <?php
                                                    include('connect.php');
                                                    $sql1="SELECT * FROM term";
                                                    $records1=mysqli_query($db,$sql1);
                                                        while($row=mysqli_fetch_array($records1,MYSQL_ASSOC))
                                                            {
                                                                echo "<option>".$row['termname']."</option>";
                                                            
                                                            }
                                                    ?> </select>
                                            </td>
                                            <td>
                                                <label>Year</label>
                                            </td>
                                            <td>
                                            <?php
                                                    // set start and end year range
                                                    $yearArray = range(2010, 2070);
                                                    ?>
                                                    <!-- displaying the dropdown list -->
                                                    <select name="year" class="form-control">                                                        
                                                        <?php
                                                        foreach ($yearArray as $year) {
                                                            // if you want to select a particular year
                                                            $selected = ($year == 2017) ? 'selected' : '';
                                                            echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                        }
                                                        ?> </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="submit" name="submit" class="btn btn-success" value="View">
                                        </td>
                                        </tr>                                        
                                    </table>
                                </form>

               
<!--****************************************************************************-->
 

                </div>
                </p>

            </div>
            
        </div>
    </div>
    
