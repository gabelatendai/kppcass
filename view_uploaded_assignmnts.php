<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 04:06
 */
?>
<?php
include "header.php";
$conn=mysqli_connect("localhost", "root", "","cadss_db");
?>


<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--**************************************************************************************************************************-->
            <div class="container" style="width:100%">

            <?php

include  "staff_header.php";
?>
                <br>

            </div> </div> </div> </div>
<!--**************ths is the success msg on saving the cord-->

<!--*************************************************************************************************************************-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Submitted Assignments</div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table col-md-12">
                        <table class=" col-md-12 table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Assignment ID</th>
                                <th>Assignment Title</th>
                                <th>Submission Date</th>
                                <th>Course Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result= mysqli_query($conn,"select * from uploads order by id DESC ");
                            while ($row= mysqli_fetch_array ($result) ){
                                $id=$row['id'];
                                $path=$row['assignment_path'];
                                $category=$row['subject_id'];
                                $student=$row['student_id'];
                                //  $sub=$row['course'];
                                $student_query = mysqli_query($conn,"select * from students where id = '$student'")or die(mysql_error());
                                $stud = mysqli_fetch_array($student_query);
                                $cat_query = mysqli_query($conn,"select * from subjects where id = '$category'");
                                $cat_row = mysqli_fetch_array($cat_query);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $stud['firstname'].'  '  .  $stud['lastname']; ?></td>
                                    <td><?php echo $row['assignment_title']; ?></td>
                                    <td><?php echo $row['copyright_year']; ?></td>
                                    <td class="center"><?php echo $cat_row['subjectname']; ?> </td>

                                    <td>

                                        <a  class="pull-right" href="<?php echo $path;?>" target="_blank"><b>Download Assignment </b></a></li>



                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>
