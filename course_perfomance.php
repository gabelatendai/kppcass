<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 22/8/2018
 * Time: 17:22
 */

//error_reporting(0);//turning off error reporting
include("header.php");
$conn=mysqli_connect("localhost", "root", "","cadss_db");
include('config.php');

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
//$id=$_GET['id'];
?>
<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php include "mark_header.php"; ?>
                <br>

            </div></div></div>

    <!--*************************************************************************************************************************-->
    <div id="page-wrapper">
        <div class="container-fluid">


            <!-- Page Heading -->

            <div id="printablediv">
                <div style="width:100%; background-color:yellow; text-align:center; font-size:20px;"><label>Students Course Work Performance </label></div>


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
                                    <th><center>Practical 1</center></th>
                                    <th><center>ITTD 1</center></th>
                                   <th><center>Practical 2</center></th>
                                    <th><center>ITTD 2</center></th>
                                    <th><center>Average</center></th>
                                   <!-- <th><center> Area Of Concern</center></th>



                                      <th><center>Rank</center></th> -->
                                    <script src="assets/js/jquery.dataTables.min.js"></script>
                                    <script src="assets/js/DT_bootstrap.js"></script>

                                </tr>
                                </thead>
                                <tbody>
                                <!--Calculating the totals marks************************************************************************************-->
                                <?php

                                $student = R::findAll('studentmarks');
                                foreach ($student as $row) {
                              //  $user_query=mysql_query("SELECT * from studentmarks ");
                               // while($row=mysql_fetch_array($user_query)) {
                                    $id=$row->id;
                                    $stu_name = $row->admission_number;
                                    $category=$row->course;
                                    // $average=  $row['total'] / 4;
                                    $prac1 =$row->practical1;
                                    $ittd1 =$row->ittd1;
                                    $prac2 =$row->practical2;
                                    $ittd2=$row->ittd2;
                                    $prac3 =$row->practical3;
                                    $ittd3 =$row->ittd3;


                                    $cat_query = mysqli_query($conn,"select * from subjects where id = '$category'")or die(mysql_error());
                                    $cat_row = mysqli_fetch_array($cat_query);
                                    $cate=$cat_row['subjectname'];

                                    $name= mysqli_query($conn,"select * from students where admission_number = '$stu_name'")or die(mysql_error());
                                    $ro = mysqli_fetch_array($name);

                                    $stud_name=$ro['firstname']."    " .$ro['lastname'];

                                    $total = ($prac1 + $prac2 + $ittd1  + $ittd2);
                                   // $ittd= ($ittd1  + $ittd2+ $ittd3)/3 /100* 30;
                                  //  $total = $practcal + $ittd;
                                    $average = $total /400*100 ;

                                    if ( $average > 80 ){
                                        // $msg = "DISTINCTION";
                                        $msg = "Programmer, Software Engineer";
                                    }
                                    elseif (  $average <= 79 && (  $average >= 60 )){
                                        $msg = "Database Administrator, System Analyst";

                                    } elseif (  $average <= 59 &&  (  $average >= 50 )){
                                        $msg = "Hardware Technician ";
                                    }
                                    elseif ( $average < 50 ){

                                        $msg = "Typist";
                                    }

                                    ?>

                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                   type="checkbox" value="<?php echo $id; ?>">

                                        </td>

                                        <td>
                                            <center><?php echo $stud_name; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $cate ; ?></center>
                                        </td>

                                        <td>
                                            <center><?php echo $row->year; ?></center>
                                        </td>

                                        <td>
                                            <center><?php echo $prac1; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $ittd1; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo  $prac2; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo  $ittd2; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo  $average; ?></center>
                                        </td>
                                       <!-- <td>
                                            <center><?php echo  $msg; ?></center>
                                        </td>-->

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