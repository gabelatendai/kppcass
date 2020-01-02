<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 22/8/2018
 * Time: 19:55
 */?>
<?php
//error_reporting(0);
include("header.php");
//$user_id = $_GET['username'];
//$sess_user = $_GET['id'];
$conn=mysqli_connect("localhost", "root", "","cadss_db");
$user=$_SESSION['id'];
//$sess_user=$_SESSION['sess_user'];
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
 $email = $_SESSION['id'];

 $init = R::findOne('users', 'id  = ?', [$email]);
 $adm=$init->id;
 $usermail=$init->email;
?>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php
                include("stud_header.php");
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
                                <th><center>Name</center></th>
                                <th><center>Email</center></th>
                                <th><center>Gender</center></th>
                                <th><center>Mobile</center></th>
                                <th><center>ID NO.</center></th>
                                <th><center>Edit</center></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php


                        
                            $query=mysqli_query($conn,"SELECT  * from staff  where users_id = '$email'");
                            $row = mysqli_fetch_array($query);
                                $id = $row['id'];

                                ?>
                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                    </td>
                                    <td><center><?php echo $row['firstname']." ".$row['lastname']; ?></center></td>
                                    <td><center><?php echo $row['email']; ?></center></td>
                                    <td><center><?php echo $row['gender']; ?></center></td>
                                    <td><center><?php echo $row['mobile']; ?></center></td>
                                    <td><center><?php echo $row['idno']; ?></center></td>

                                    <td>
                                        <center><a href="edit_staff<?php echo '?id='. $id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Edit</a></center></td>


                                </tr>

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
