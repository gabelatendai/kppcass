<?php
include 'rb.php';
$conn=mysqli_connect("localhost", "root", "","cadss_db");

R::setup('mysql:host=localhost;dbname=cadss_db', 'root', ''); //for both mysql or mariaDB
?>

<?php
if(isset($_GET['ncjan'])){
    if($_GET['ncjan']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nc' AND intake ='0' ORDER BY lastname");

        $delimiter=",";
        $filename= "nc_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['ncmay'])){
    if($_GET['ncmay']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nc' AND intake ='1' ORDER BY lastname");

        $delimiter=",";
        $filename= "nc_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}

if(isset($_GET['nd1jan'])){
    if($_GET['nd1jan']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nc' AND intake ='0' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd1_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}

if(isset($_GET['nd1may'])){
    if($_GET['nd1may']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nd1' AND intake ='1' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd1_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}

if(isset($_GET['nd2jan'])){
    if($_GET['nd2jan']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nd2' AND intake ='0' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd2_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['nd2may'])){
    if($_GET['nd2may']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nd2' AND intake ='1' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd2_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['nd3jan'])){
    if($_GET['nd3jan']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nd3' AND intake ='0' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd3_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['nd3may'])){
    if($_GET['nd3may']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='nd3' AND intake ='1' ORDER BY lastname");

        $delimiter=",";
        $filename= "nd3_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['hndjan'])){
    if($_GET['hndjan']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='hnd' AND intake ='0' ORDER BY lastname");

        $delimiter=",";
        $filename= "hnd_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}
if(isset($_GET['hndmay'])){
    if($_GET['hndmay']=='true'){
        $query= mysqli_query($conn,"Select * from students WHERE level='hnd' AND intake ='1' ORDER BY lastname");

        $delimiter=",";
        $filename= "hnd_classlist_". date('Ymd').".csv";

        $f= fopen('php://memory','w');
        $fields= array('Admission Number','Name','Gender','Email Address','Phone Number','Address');
        fputcsv($f,$fields,$delimiter);

        while ($row=$query->fetch_assoc()){

            $lineData = array($row['admission_number'],$row['lastname'].' '.$row['firstname'],$row['gender'],$row['email'],$row['mobile'],$row['address']);
            fputcsv($f,$lineData,$delimiter);
        }
        fseek($f,0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'. $filename .'";');

        fpassthru($f);
    }

}

?>
