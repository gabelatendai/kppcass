<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 16:06
 */
?>
<?php
error_reporting(0);//turning off error reporting
include("header.php");
?>
<?php
$conn=mysqli_connect("localhost", "root", "","cadss_db");
//R::setup('mysql:host=localhost;dbname=sms2', 'root', ''); //for both mysql or mariaDB
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', '');
$id = @$_GET['course'];
$result= mysqli_query($conn,"select * from course where id =  '$id'") or die (mysql_error());
$row= mysqli_fetch_array ($result);
$name = $row['coursename'];
$cos = $row['id'];

if (isset($_GET['course']))
{
    $studentmarks = R::load('studentmarks', $_GET['course']);

}
if (isset($_POST['register'])){




    $studentmarks  = R::load('studentmarks', $_POST['course'] );
    $studentmarks->admission_number=$_POST['admission_number'];
    $studentmarks->year=$_POST['year'];
    $studentmarks->course=$cos;
    $studentmarks->theory1=$_POST['theory'];
    $studentmarks->practical1=$_POST['practical'];
    $studentmarks->ittd1=$_POST['field'];
    $studentmarks->test1=$_POST['test'];
    $studentmarks  ->date =date('Y-m-d H:i:s');
    R::store($studentmarks );
    $message = "mark updated";





}?>
<?php
require_once('session1.php');
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
                ?>       </ul>
                <br>

            </div>

            <!--*************************************************************************************************************************-->
            <h2 align="center">Record Set 1 marks</h2>   <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Marks for <?php echo  $name;
                                //  echo R::load('course', $idy)->coursename; ?>

                                <label><?php //echo $course->home ?></label></div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">


                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div style="float:left; position:relative">
                                            <h4><font color="green">Marks Entry</font></h4>
                                            <table>
                                                <tr>
                                                    <td><label>Student Name</label></td>
                                                    <td><select  name="admission_number" class="select2_single form-control" tabindex="-1" required="required">
                                                            <?php

                                                            $result= mysqli_query($conn,"select * from students") or die (mysql_error());
                                                            while ($row= mysqli_fetch_array ($result) ){
                                                                $id=$row['admission_number'];
                                                                ?>
                                                                <option value="<?php echo $row['admission_number']; ?>"><?php echo $row['firstname']." ".$row['lastname']; ?></option>
                                                            <?php } ?>
                                                        </select></td>

                                                    <td><label>Year</label></td>
                                                    <?php
                                                    // set start and end year range
                                                    $yearArray = range(2016, 2050);
                                                    ?>
                                                    <!-- displaying the dropdown list -->
                                                    <td>  <select name="year" class="form-control">
                                                            <?php
                                                            foreach ($yearArray as $year) {
                                                                // if you want to select a particular year
                                                                $selected = ($year == 2018) ? 'selected' : '';
                                                                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                            }
                                                            ?> </select></td> </tr></table>

                                        </div>

                                        <div style="float:left; position:relative">
                                            <h4><font color="green">Marks </font></h4>

                                            <table><tr>
                                                    <td><label>Theory Assignment
                                                            <input type="number" name="theory" id="a" value="<?php echo $studentmarks->theory1 ?>" class="form-control"  onkeyup="final()" max="100" >
                                                    </td>
                                                    <td><label>Practical Assignment
                                                            <input type="number" name="practical" id="b" class="form-control"  value="<?php echo $studentmarks->practical1 ?>" onkeyup="final()" max="100" >
                                                    </td></tr>

                                                <tr>
                                                    <td><label>ITTD
                                                            <input type="number" name="field" id="c" class="form-control"  value="<?php echo $studentmarks->ittd1 ?>" onkeyup="final()" max="100" >
                                                    </td>
                                                    <td><label>Test
                                                            <input type="number" name="test" id="d" class="form-control"  value="<?php echo $studentmarks->test1 ?>" onkeyup="final()" max="100" >
                                                    </td></tr>
                                            </table>
                                            <br>
                                            <div style="float:right;  position:relative; clear:both;">
<?php   echo $message;    ?>
                                                <input type="submit" name="register" value="Record Marks" class="btn btn-success" >
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--****************************************************************************-->


                <!--****************************************************************************-->


            </div>
        </p>


    </div>

</div>
</div>

<?php

include  "footer.php";
?>