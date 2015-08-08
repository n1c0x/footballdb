
<?php

include('../connect.php');

/* ************************************* */
/* ************************************* */
/* ************************************* */
## # # ## ########  ##     ## ##    ##  ######   ######## ##    ## 
##     ## ##     ## ##     ## ###   ## ##    ##  ##       ###   ## 
##     ## ##     ## ##     ## ####  ## ##        ##       ####  ## 
##     ## ########  ##     ## ## ## ## ##   #### ######   ## ## ## 
##     ## ##     ## ##     ## ##  #### ##    ##  ##       ##  #### 
##     ## ##     ## ##     ## ##   ### ##    ##  ##       ##   ### 
 #######  ########   #######  ##    ##  ######   ######## ##    ##
/* ************************************* */
/* ************************************* */
/* ************************************* */

if ($_GET['art'] == "uebungen") 
{

date_default_timezone_set('Europe/Berlin');
$datum = strtotime(date('Y')."-".$_POST['Monat']."-".$_POST['Tag']);

$sql = "UPDATE fussball_uebungen.uebungen 
			SET titel='$_POST[titel]', datum='$datum', organisation='$_POST[organisation]', durchfuehrung='$_POST[durchfuehrung]', hinweise='$_POST[hinweise]', dauer='$_POST[laenge]', author='$_POST[author]', gruppierung='$_POST[gruppierung]', uebungsart='$_POST[uebungsart]'
			WHERE ID='$_GET[id]';";

mysqli_query($con,$sql) or die ("MySQL-Error: " . mysql_error());


if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	}
else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		echo "Type: " . $_FILES["file"]["type"] . "<br />";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br>";	
		
		if (file_exists("../upload/". $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
		else
			{
				echo $_GET['id'].".jpg"."<br>";
				unlink($_GET['id'].".jpg");
				move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $_GET['id'].".jpg");
				echo "Stored in: " . "./upload/" . $_GET['id'].".jpg";
			}
	}
header('Location:/index.php?page=2&art=uebungen');
exit();
}

/* ************************************* */
/* ************************************* */
/* ************************************* */
 ######  ########  #### ######## ##       ######## ########  
##    ## ##     ##  ##  ##       ##       ##       ##     ## 
##       ##     ##  ##  ##       ##       ##       ##     ## 
 ######  ########   ##  ######   ##       ######   ########  
      ## ##         ##  ##       ##       ##       ##   ##   
##    ## ##         ##  ##       ##       ##       ##    ##  
 ######  ##        #### ######## ######## ######## ##     ##
/* ************************************* */
/* ************************************* */
/* ************************************* */

elseif ($_GET['art'] == "spieler") 
{
	
	$sql = "UPDATE fussball_uebungen.spieler
			SET name='$_POST[name]', vorname='$_POST[vorname]', strasse='$_POST[strasse]', hausnummer='$_POST[hausnummer]', PLZ='$_POST[PLZ]', stadt='$_POST[stadt]', vorwahl_festnetz='$_POST[vorwahl_festnetz]', telefon_nr='$_POST[telefon_nr]', vorwahl_handy='$_POST[vorwahl_handy]', handy_nr='$_POST[handy_nr]', pass_nr='$_POST[pass_nr]', id_position='$_POST[id_position]', staerken='$_POST[staerken]', schwaechen='$_POST[schwaechen]'
			WHERE SID='$_GET[id]';";

mysqli_query($con,$sql);

if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	}
else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		echo "Type: " . $_FILES["file"]["type"] . "<br />";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br>";	
		
		if (file_exists("../upload/spieler/". $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
		else
			{
				echo $_GET['id'].".jpg"."<br>";
				unlink($_GET['id'].".jpg");
				move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/spieler/" . $_GET['id'].".jpg");
				echo "Stored in: " . "../upload/spieler/" . $_GET['id'].".jpg";
			}
	}
header('Location:/index.php?page=2&art=spieler');
exit();
}
?>

