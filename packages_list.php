
<?php
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
error_reporting(0);
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
                            
                             <?php

include("mark_header.php");
?>

                            <br>

                        </div>  </div>  </div>  </div>
                        
  <!--*************************************************************************************************************************-->

                <center><h4><strong>Enter marks, each student at a time</strong><h4></center>
                
                       
                      
                        <!-- block -->                      
                        <div id="block_bg" class="block">   
                            <div class="navbar navbar-inner block-header">
                                                                                
                            <table>
                            <tr>
                            <td><a button type='button' class="btn btn-primary" href="markstep1.php"><--</a></td>
                            <td><a button type='button' class="btn btn-primary glyphicon  glyphicon-print" href="#"></a></td>
                            <td><label>Search using Admission number</label></td>
                            <td><input type="text" name="myInput" id="myInput" class="form-control"
                             placeholder="Adm no" onkeyup="myFunction()"></td>
                             <td><label>Name</label></td>
                             <td><input type="text" name="myInput2" id="myInput2" class="form-control"
                             placeholder="Name" onkeyup="myFunction2()"></td></tr></table>
                            </div>

                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div class="x_content">
                                        <!-- content starts here -->
                                        <div id="div-id-name">
                                            <div class="table-responsive col-md-offset-1">
                                                <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                                                <thead>
                                          <tr>
                                                <th></th>
                                                <th><center>Adm No.</center></th>
                                                <th><center>Name</center></th>
                                                <th><center>Gender</center></th>

                                                <th><center>Mobile</center></th>

                                                <th><center>Reg. Date</center></th>
                                                <th><center>Edit</center></th>
                                                <script src="assets/js/jquery.dataTables.min.js"></script>
                                                <script src="assets/js/DT_bootstrap.js"></script>
                                                <th></th>
                                           </tr>
                                        </thead>
                                        <tbody>
                    <?php 
                   
                    $sql ="SELECT  * from students";
                    $user_query=mysqli_query($conn,$sql) or die("error getting data");
                    while($row = mysqli_fetch_array($user_query)){
                    $id = $row['admission_number'];
                    ?>


                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><center><?php echo $row['admission_number']; ?></center></td>
                                                <td><center><?php echo $row['firstname']." ".$row['lastname']; ?></center></td>
                                                <td><center><?php echo $row['gender']; ?></center></td>
                                                <td><center><?php echo $row['mobile']; ?></center></td>
                                                <td><center><?php echo $row['date']; ?></center></td>
                                            
                                                <td>
                                                <center><a href="marks_packages.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Enter Marks</a></center></td>
                                                <td>
                                                <center><a href="markstep7.php <?php echo '?id='.$id; ?>" class="btn btn-info"><i class="glyphicon glyphicon-print"></i>Print Transcript</a></center></td>
                                                
                                            
                            </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                                
            </div>
                            </div>
                        </div>
                    </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
  <!--*********************************************************************************-->
                    <?php
                    include("footer.php");
                    ?>
