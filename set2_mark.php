<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 17/8/2018
 * Time: 16:06
 */
?>
<?php
//error_reporting(0);//turning off error reporting
include("header.php");

$conn=mysqli_connect("localhost", "root", "","cadss_db");

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
$id = @$_GET['course'];
$result= mysqli_query($conn,"select * from subjects where id =  '$id'") or die ('error in connecting');
$roll= mysqli_fetch_array ($result);
$name = $roll['subjectname'];
//$cos = $row['id'];

//$cos = $_GET['course'];
$query=mysqli_query($conn,"select * from studentmarks where course='$id'")or die('error in connecting');
$row=mysqli_fetch_array($query);


?>

<?php
require_once('session1.php');
?>
<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="tab-1">

        <p>
        <div class="table-responsive"  >
            <!--****************************************************************************-->
            <div class="container" style="width:100%">

                <?php
                require_once('mark_header.php');
                ?>
                <br>

            </div>

            <!--*************************************************************************************************************************-->
         <h2 align="center">Set 2 marks</h2>   <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Marks for <?php echo  $name;
                                //  echo R::load('course', $idy)->coursename; ?> </div>
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

                                                            $res= mysqli_query($conn,"select * from students") or die ('error in connecting');
                                                            while ($ro= mysqli_fetch_array ($res) ){
                                                                $id=$ro['admission_number'];
                                                                ?>
                                                                <option value="<?php echo $ro['admission_number']; ?>"><?php echo $ro['firstname']." ".$ro['lastname']; ?></option>
                                                            <?php } ?>
                                                        </select></td>
                                                    <td><label>Year</label></td>
                                                    <td> <?php echo $row['year']; ?> </td> </tr></table>

                                        </div>

                                        <div style="float:left; position:relative">
                                            <h4><font color="green">Marks </font></h4>

                                            <table><tr>
                                                    <td><label>Theory Assignment
                                                            <input type="number" name="theory" id="a" value="<?php echo $row['theory2']; ?>" class="form-control"  onkeyup="final()" max="100" >
                                                    </td>
                                                    <td><label>Practical Assignment
                                                            <input type="number" name="practical" id="b" class="form-control"  value="<?php echo $row['practical2']; ?>" onkeyup="final()" max="100" >
                                                    </td></tr>

                                                <tr>
                                                    <td><label>ITTD
                                                            <input type="number" name="field" id="c" class="form-control"  value="<?php echo $row['ittd2'] ;?>" onkeyup="final()" max="100" >
                                                    </td>
                                                    <td><label>Test
                                                            <input type="number" name="test" id="d" class="form-control"  value="<?php echo $row['test2']; ?>" onkeyup="final()" max="100" >
                                                    </td></tr>
                                            </table>
                                            <br>
                                            <div style="float:right;  position:relative; clear:both;">
                                                <?php   echo @$message;    ?>
                                                <input type="submit" name="update" value="Record Marks" class="btn btn-success" >
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--****************************************************************************-->


            </div>
        </p>


    </div>

</div>
</div>

<?php

$id = $_GET['course'];

if (isset($_POST['update'])){

    $number = $_POST['admission_number'];
    // $studentmarks  = R::load('studentmarks',$_POST['course']);
    $theory2=$_POST['theory'];
    $practical2=$_POST['practical'];
    $ittd2=$_POST['field'];
    $test2=$_POST['test'];
    // $studentmarks  ->date =date('Y-m-d H:i:s');
    // R::store($studentmarks );
    mysql_query(" UPDATE studentmarks SET theory2='$theory2', practical2='$practical2', ittd2='$ittd2', test2='$test2' WHERE course = '$id' and admission_number ='$number'")or die(mysql_error());

    $message = "marks updated";

}
include  "footer.php";
?>
