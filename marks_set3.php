<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 20:57
 */
error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
//$id=$_GET['id'];
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

            </div></div></div>

    <!--*************************************************************************************************************************-->
    <div id="page-wrapper">
        <div class="container-fluid">


            <!-- Page Heading -->

            <td style="width:30px"><a button type='button'  onclick="javascript:printDiv('printablediv')" class="btn btn-primary glyphicon  glyphicon-print"></a></td>
            <td><a button type='button' class="btn btn-primary" href="markstep4.php">Set 1</a></td></tr>
            <td><a button type='button' class="btn btn-primary" href="marks_set2.php">Set 2</a></td></tr>
            <td><a button type='button' class="btn btn-primary" href="marks_set3.php">Set 3</a></td></tr>
            <td><a button type='button' class="btn btn-primary" href="exam.php">Exam Mark</a></td></tr>

            <div id="printablediv">
                <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Set 3 Marks. </label></div>
                <div class="x_content">
                    <!-- content starts here -->
                    <div id="div-id-name">
                        <div class="table-responsive col-md-offset-1">
                            <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th><center>Adm No.</center></th>
                                        <th><center>Course</center></th>
                                        <th><center>Year</center></th>
                                        <th><center>Practical</center></th>
                                        <th><center>ITTD</center></th>

                                        <!--  <th><center>Total</center></th>
                                        <th><center>Average</center></th>
                                        <th><center>Grade</center></th>
                                        <th><center>Area Of Concern</center></th>


                                     <th><center>Rank</center></th> -->

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--Calculating the totals marks************************************************************************************-->
                                    <?php

                                    $user_query=mysqli_query($conn,"SELECT * from studentmarks ");
                                    while($row=mysqli_fetch_array($user_query)) {
                                        $id=$row['id'];
                                        //  $path=$row['book_path'];
                                        $subject_id=$row['course'];
                                        // $average=  $row['total'] / 4;

                                        $cat_query = mysqli_query($conn,"select * from subjects where id = '$subject_id'")or die(mysql_error());
                                        $cat_row = mysqli_fetch_array($cat_query);
                                        $cate=$cat_row['subjectname'];
                                        /*
                                                                                      if ( $average > 80 ){
                                                                                          $msg = "DISTINCTION";
                                                                                          $area = "Programmer, Software Engineer";
                                                                                      }else if (  $average <= 79 ||  (  $average >= 60 )){
                                                                                          $msg = "Database Administrator, System Analyst";

                                                                                      }else if (  $average <= 50 ||  (  $average >= 50 )){
                                                                                          $msg = "Hardware Technician ";
                                                                                      }else if ( $average < 50 ){

                                                                                          $msg = "Typist";
                                                                                      }
                                        */
                                        ?>

                                        <tr>
                                            <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                       type="checkbox" value="<?php echo $id; ?>">

                                            </td>

                                            <td>
                                                <center><?php echo $row['admission_number']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $cate ; ?></center>
                                            </td>

                                            <td>
                                                <center><?php echo $row['year']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $row['practical3']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $row['ittd3']; ?></center>
                                            </td>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                        </form>
                    </DIV>
                    <!-- block 8***************************************************************************************-->


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