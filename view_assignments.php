<?php
include "header.php";
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$email = $_SESSION['id'];

$init = R::findOne('students', 'users_id  = ?', [$email]);
$admission=$init->admission_number;
$level=$init->level;
$cos=$init->course_id;
 ?>


<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--**************************************************************************************************************************-->
            <div class="container" style="width:100%">

                <?php
                include "stud_header.php";
                ?>
                <br>

            </div> </div> </div> </div>
<!--**************ths is the success msg on saving the cord-->

<!--*************************************************************************************************************************-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">My Assignments</div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th>Assignment ID</th>
                                             <th>Subject Name</th>
                                            <th>Assignment Title</th>
                                            <th>Submission Date</th>
                                            
                                            
                                             <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    
                            $count = R::findAll('assignments', 'course_id = ? AND level = ?', [$cos, $level]);
                           
                           foreach($count as $row)
                                        {
                            $id=$row->id;
                            $path=$row->assignment_path;
                            $category=$row->subject_id;
                             
                            $cat_query = mysqli_query($conn,"select * from subjects where id = '$category'");
                            $cat_row = mysqli_fetch_array($cat_query);
                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="center"><?php echo $cat_row['subjectname']; ?> </td>
                                            <td><?php echo $row['assignment_title']; ?></td>
                                            <td><?php echo $row['copyright_year']; ?></td>
                                           
                                            
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
