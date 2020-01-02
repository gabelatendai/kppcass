
<?php
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
 $email = $_SESSION['id'];

 $init = R::findOne('users', 'email  = ?', [$email]);
 $adm=$init->id;
?>
<?php
require_once('session1.php');
?>
<?php

            // $result = mysqli_fetch_array(mysqli_query($conn,$select));
    $qry=mysqli_query($conn,"SELECT * FROM  staff WHERE email='$email'");
        $rec = mysqli_fetch_array($qry);
$myid = $rec['id'];
?>

<div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                
                <p>
                    <div class="table-responsive"  >
<!--****************************************************************************-->
                 <div class="container" style="width:100%">
                     <?php

                     include("staff_header.php");

                     ?>

                            <br>
                            
                        </div> </div> </div> </div>

                
                       
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                              </div>
                              <div class="modal-body">
                               Are you to sure you want to delete this?
                              </div>
                              <div class="modal-footer">
                              <form method = "POST">
                                <input type="submit" name="delete" value = "Delete" class="btn btn-danger">
                                
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- block -->                      
                        <div id="block_bg" class="block">
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

                                                <th><center>Name</center></th>
                                                <th><center>Gender</center></th>
                                                <th><center>Course</center></th>
                                                <th><center>Mobile</center></th>
                                                <th><center>ID NO.</center></th>
                                                <th><center>Edit</center></th>

                                           </tr>
                                        </thead>
                                        <tbody>
                        <?php 
                    

                   // $sql ="SELECT  * from staff";
                    $user_query=mysqli_query($conn,"SELECT  * from staff where id = '$myid'") or die("error getting data");
                    $row = mysqli_fetch_array($user_query);
                    $id = $row['id'];
                  
                        ?>
                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><center><?php echo $row['firstname']." ".$row['lastname']; ?></center></td>
                                                <td><center><?php echo $row['gender']; ?></center></td>
                                                <td><center><?php echo $row['department_id']; ?></center></td>
                                                <td><center><?php echo $row['mobile']; ?></center></td>
                                                <td><center><?php echo $row['idno']; ?></center></td>

                                                <td>
                                                <center><a href="edit_staff<?php echo '?id='. $id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center></td>

                                            
                            </tr>
                                                <?php  ?>
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
include "footer.php";
?>
