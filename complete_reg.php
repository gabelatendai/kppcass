
<?php

error_reporting(0);
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
//$user_id = $_GET['id'];

$user_id=$_SESSION['id'];
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
?>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php
                include("stud_header");
                ?>
                <br>

            </div> </div> </div> </div>

<!--*************************************************************************************************************************-->
<div id="page-wrapper">
    <div class="container-fluid">


        <!-- Page Heading -->
        <nav>


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
                                <th><center>Email Address</center></th>
                                <th><center>Mobile</center></th>
                                <th><center>Address</center></th>
                                <th><center>Reg. Date</center></th>
	                            <th><center>Level</center></th>
                                <th><center>Edit</center></th>

                                <script src="assets/js/jquery.dataTables.min.js"></script>
                                <script src="assets/js/DT_bootstrap.js"></script>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $user_query=mysqli_query($conn,"SELECT * from students where users_id = '$user_id'");
                            $course=mysqli_fetch_array($user_query);
                          //  $courses = R::findone('students', 'email  = ?', [$user_id]);

                           // foreach ($courses as $course) {
                                $idy= $course['id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idy; ?>">
                                    </td>
                                    <td><center><?php echo  $course['admission_number']; ?></center></td>
                                    <td><?php echo  $course['firstname']. '  '. $course['lastname']; ?></td>
                                    <td><center><?php echo  $course['gender']; ?></center></td>
                                    <td><center><?php echo  $course ['email']; ?></center></td>


	                                <td><center><?php echo $course['mobile']; ?></center></td>


                                    <td><center><?php echo  $course['address']; ?></center></td>
                                    <td><center><?php echo  $course['date'];  ?></center></td>
	                                <td><center><?php echo $course['level']; ?></center></td>
                                    <td>
                                        <center><a href="viewstudentsedit1<?php echo  '?id='.$idy;  ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Edit</a></center></td>


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