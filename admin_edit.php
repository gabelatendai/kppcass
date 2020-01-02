<?php

include("header.php");

error_reporting(0);
$conn=mysqli_connect("localhost", "root", "","cadss_db");
$id = $_GET['id'];


$result =mysqli_query($conn, "SELECT * FROM users WHERE id= '$id'");
//$result = mysqli_fetch_array(mysqli_query($conn,$select));

  $rec = mysqli_fetch_array($result);
        $fname = $rec['firstname'];
        $lname = $rec['lastname'];
        $email = $rec['email'];

?>
<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Edit User</div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                    <!--------------------form------------------->
                                    <form method="post">
                                        <tbody>
                                        <tr>
                                            <center>

                                                <div class="form-group input-group">
                                                    <label class="col-sm-2 control-label">Email</label>
                                                    <input type="text"  class="form-control" id="fname" name="fname" value="<?php echo $email?>" placeholder="Firstname"required autofocus>
                                                </div>

                                                <div class="form-group input-group">
                                                    <label class="col-sm-2 control-label">Lastname</label>
                                                    <input type="text"  class="form-control" id="lname" name="lname" value="<?php echo $lname?>" placeholder="Lastname"required>
                                                </div>

                                                <div class="form-group input-group">
                                                    <label class="col-sm-2 control-label">Password</label>
                                                    <input type="password"  class="form-control" id="password" name="password" placeholder="Password"required>
                                                </div>



                                                <div class="col-md-11">
                                                    <button name="update" class="btn btn-success">Update</button>
                                                    <a button id="cancel" name="cancel" class="btn btn-danger" href="manage_account" >Cancel</button></a>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                        </tr>
                                        </tbody>
                                </div>
                                </center>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php

        include("footer.php");
                ?>

