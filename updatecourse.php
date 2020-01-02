
  <?php
  error_reporting(0);
  include('connect.php');
  
    if (isset($_POST['register'])){
        
                $id=$_POST['id'];
                $department_id = $_POST['course_id'];
                $level = $_POST['level'];
                $coursename= $_POST['subjectname'];
        $course_code=$_POST['subject_code'];


                $sql3="UPDATE subjects SET  course_id ='$department_id', subjectname ='$coursename', subject_code ='$course_code', level ='$level'
               WHERE id = '$id'";
               mysqli_query($db,$sql2);
               mysqli_query($db,$sql3);

?>
                        
                        <script>
                        alert('Record Succsessfully Updated');
                        window.location = "subject_list";
                        </script>

<?php

}?>