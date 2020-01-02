<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 18/8/2018
 * Time: 00:23
 */

error_reporting(0);//turning off error reporting
include("header.php");
include('config.php');
$conn=mysqli_connect("localhost", "root", "","cadss_db");
R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
$me= $_SESSION['id'];
//$id=$_GET['admission_number'];
$user=mysqli_query($conn,"SELECT * from students where users_id = '$me'");
$r=mysqli_fetch_array($user);
$admin=$r['admission_number'];
$name=$r['firstname']."   ". $r['lastname'];
?>

	<script type="text/javascript" >
		function printlayer(layer)
		{
			var generator =window.open(",'name,");
			var layetext =document.getElementById(layer);
			generator.document.write(layetext.innerHTML.replace("Print Me"));

			generator.document.close();
			generator.print();
			generator.close();
		}
		function myFunction() {
			var d = new Date();
			var name = "Designed by: Gabriel Musodza";
			document.getElementById("demo").innerHTML = Date();
			document.getElementById("demo").innerHTML = name;
		}
	</script>

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

            </div></div></div>

    <!--*************************************************************************************************************************-->

	<div id="page-wrapper">
        <div class="container-fluid">


            <!-- Page Heading -->

	        <td style="width:30px"><a button type='button'  onClick="javascript:printlayer('div-id-name')" class="btn btn-primary glyphicon  glyphicon-print"></a></td>

	        <div id="div-id-name">
            <div id="printablediv">
                <div style="width:100%; text-align:center; font-size:20px;"><label>Marks For  <?php echo $name;  ?> </label></div>
                <div class="x_content">
                    <!-- content starts here -->

                        <div class="table-responsive box-body">
	                        <table cellpadding="0"  border="1"  width="auto" class="table  table-striped table-condensed table-hover dataTables table-bordered" id="myTable">

	                        <thead>
                                    <tr>
                                        <th><center>Subject</center></th>
                                        <th><center>Year</center></th>
                                        <th><center>Theory1</center></th>
                                        <th><center>Practical1</center></th>
                                        <th><center>ITTD1</center></th>
                                        <th><center>Test1</center></th>
                                        <th><center>Theory 2</center></th>
                                        <th><center>Practical 2</center></th>
                                        <th><center>ITTD 2</center></th>
                                        <th><center>Test 2</center></th>
                                        <th><center>Practical 3</center></th>
                                        <th><center>ITTD 3</center></th>
                                        <th><center>Practical course work Mark </center></th>
                                        <th><center>ITTD1 course work Mark</center></th>
                                        <th><center>Course work Mark </center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--Calculating the totals marks************************************************************************************-->
                                    <?php

                                   // $student = R::findAll('studentmarks', 'admission_number =?', [$id]);
                                  //  foreach ($student as $stud) {

                                    $user_query=mysqli_query($conn,"SELECT * from studentmarks where admission_number = '$admin'");
                                    while($stud=mysqli_fetch_array($user_query)) {
                                        $category=$stud['course'];

                                        $prac1 =$stud['practical1'];
                                        $ittd1 =$stud['ittd1'];
                                        $prac2 =$stud['practical2'];
                                        $ittd2=$stud['ittd2'];
                                        $prac3 =$stud['practical3'];
                                        $ittd3 =$stud['ittd3'];



                                        $cat_query = mysqli_query($conn,"select * from subjects where id = '$category'")or die(mysql_error());
                                                                                $cat_row = mysqli_fetch_array($cat_query);
                                                                                $cos_name=$cat_row['subjectname'];

                                        $practcal = ($prac1 + $prac2 + $prac3)/3 /100* 30 ;
                                        $ittd= ($ittd1  + $ittd2+ $ittd3)/3 /100* 30;
                                        $total = $practcal + $ittd;
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
                                                       type="checkbox" value="<?php echo $stud['id']; ?>">

                                            </td>
                                            <td>
                                                <center><?php  echo $cos_name ; ?></center>
                                            </td>

                                            <td>
                                                <center><?php echo $stud['year']; ?></center>
                                            </td>
	                                        <td>
                                                <?php
                                                if ($stud['theory1'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['theory1']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['theory1']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['practical1'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['practical1']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['practical1']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['ittd1'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['ittd1']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['ittd1']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['test1'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['test1']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['test1']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['theory2'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['theory2']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['theory2']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['practical2'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['practical2']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['practical2']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['ittd2'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['ittd2']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['ittd2']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['test2'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['test2']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['test2']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['practical3'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['practical3']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['practical3']; }?></center>
	                                        </td>
	                                        <td>
                                                <?php
                                                if ($stud['ittd3'] < 50 ){
                                                    ?>
			                                        <center style="color: red"><?php echo $stud['ittd3']; ?></center>
                                                    <?php
                                                }else{?>
		                                        <center style="color: blue"><?php echo $stud['ittd3']; }?></center>

	                                        </td>
                                            <td>
                                                <center><?php echo $practcal ; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $ittd ; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $total ; ?></center>
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

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
</body>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					text: 'Pdf',
					orientation: 'landscape',
					title: "Marks for  <?php echo $name;  ?>",
				},
				{
					extend: 'excel',
					text: 'Excel',
					orientation: 'landscape',
					title: "Marks for  <?php echo $name;  ?>",

				},
				{
					extend: 'csv',
					text: 'CSV',
					orientation: 'landscape',
					title: "Marks for  <?php echo $name;  ?>",
				},
				{
					extend: 'print',
					text: 'Print',
					orientation: 'landscape',
					title: "Marks for  <?php echo $name;  ?>",

				},
				{
					extend: 'copy',
					text: 'Copy',
					orientation: 'landscape',
					title: "Marks for  <?php echo $name;  ?>",

				}],
		} );
	} );

</script>
