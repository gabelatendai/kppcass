<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 15:17
 */
?>
<?php include ('header.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
$id = $_GET['course'];
?>
<div class="row">
    <div class="col-lg-12">
        <br />
        <ol class="breadcrumb">
            <li ><a href="home.php">Home</a>
            </li> <li class="active"><a href="book.php">Books</a>
            </li>
        </ol>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">


            <br />
            <br />
            <div class="x_title">
                <h2><i class="fa fa-book"></i> Book List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>


                        <a href="course_mark2.php?course=<?php echo $id ;?>" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i>View Course Mark</button>
                        </a>

                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <!-- If needed
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a></li>
                                <li><a href="#">Settings 2</a></li>
                            </ul>
                        </li>
                    -->
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>

            </div>
            <div class="x_content">
                <!-- content starts here -->
                <div id="div-id-name">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>
                            <tr>

                                <th>No</th>
                                <th>ITTD</th>
                                <th>Practical</th>
                                <th>Mark Series</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $result= mysqli_query($conn,"select * from marks where course_id = '$id' ") or die (mysql_error());
                            while ($row= mysqli_fetch_array ($result) ){

                                // $cat_query = mysql_query("select * from marks where mark_series  = 'set 1' ")or die(mysql_error());
                                //    $cat_row = mysql_fetch_array($cat_query);

                                $row['ittd'];
                                $prac_cos_mark ="18";
                                $ittd_cos_mark ="20.3";
                                ?>
                                <tr>
                                    <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
                                    <td style="word-wrap: break-word; width: 10em;"><?php echo $row['admission_number']; ?></td>
                                    <td style="word-wrap: break-word; width: 10em;"><?php echo $row['ittd']; ?></td>
                                    <td style="word-wrap: break-word; width: 10em;"><?php  echo $row['practical']; ?></td>
                                    <td style="word-wrap: break-word; width: 10em;"><?php echo $row['mark_series'];?></td>
                                    <td style="word-wrap: break-word; width: 10em;"><?php echo $prac_cos_mark ;?></td>
                                    <td style="word-wrap: break-word; width: 10em;"><?php echo $ittd_cos_mark;?></td>


                                    <td>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret pull-right"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a class="pull-right" href="view_book.php?id=<?php echo $row['id'];?>"><b>Book Info</b></a></li>

                                                <li><a  class="pull-right" href="<?php echo $path;?>" target="_blank"><b>Read </b></a></li>
                                                <?php // }
                                                if (@$_SESSION['role'] == 'admin'){  ?>
                                                <li><a class="pull-right btn btn-danger" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                                        <b> <p>Delete</p></b></a></li>
                                                <li><a role="menuitem" tabindex="-1" class="pull-right" href="edit_book.php?id=<?php echo  $id; ?>"><b>Edit Info</b></a></li>
                                                <li role="separator" class="divider"></li>
                                            </ul>

                                            <?php } ?>
                                            <!-- delete modal user -->

                                            <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Book</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger">
                                                                Are you sure you want to delete?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                                <a href="delete_book.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- content ends here -->
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
<script language="javascript" type="text/javascript">
    $(window).load(function()
    {
        $('#loading').hide();
    });
</script>
