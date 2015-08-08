<?php
include('connect_infos.php');
//open a connection to a sql server
$con=mysqli_connect($server,$user,$pw,$db);
if(!$con)
{
	die('Could not connect: '.mysql_error());
}
?>
