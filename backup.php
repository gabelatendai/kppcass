<?php require_once('Connections/localhost.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>KPPCASS</title>
<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
</head>

<body>
<?php
$hostname_localhost = "localhost";
$database_localhost = "cadss_db";
$username_localhost = "root";
$password_localhost = "";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_localhost, $localhost);
$db_selected = mysql_select_db($database_localhost, $localhost);

backup_tables('localhost','root','','cargo carriers');

/* Backup the Database  OR Table */
function backup_tables($hostname_localhost,$username_localhost,$password_localhost,$database_localhost,$tables = '*')
{

mysql_select_db($database_localhost, $localhost);
$return= 0;
//Select all Tables
if($tables == '*')
{
$tables = array();
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}

//Repeat until all tables have been backed up
foreach($tables as $table)
{
$result = mysql_query('SELECT * FROM '.$table);
$num_fields = mysql_num_fields($result);

$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
//$return.= "\n\n".$row2[1].";\n\n";
$return.= "\n\n".$row2[1].";\n\n";
for ($t = 0; $t < $num_fields; $t++)
{
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($s=0; $s<$num_fields; $s++)
{
$row[$s] = addslashes($row[$s]);
$row[$s] = ereg_replace("\n","\\n",$row[$s]);
if (isset($row[$s])) { $return.= '"'.$row[$s].'"' ; } else { $return.= '""'; }
if ($s<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}

//save file
$capture = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
fwrite($capture,$return);
fclose($capture);
}
header("location:admin.php");
?>


</body>
</html>
