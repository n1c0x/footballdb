
<?php

include('../connect.php');

/*
********************************************************************
********************************************************************
********************************************************************
## # # ## ########  ##     ## ##    ##  ######   ######## ##    ## 
##     ## ##     ## ##     ## ###   ## ##    ##  ##       ###   ## 
##     ## ##     ## ##     ## ####  ## ##        ##       ####  ## 
##     ## ########  ##     ## ## ## ## ##   #### ######   ## ## ## 
##     ## ##     ## ##     ## ##  #### ##    ##  ##       ##  #### 
##     ## ##     ## ##     ## ##   ### ##    ##  ##       ##   ### 
 #######  ########   #######  ##    ##  ######   ######## ##    ##
********************************************************************
********************************************************************
********************************************************************
*/
if ($_GET['art'] == "uebungen") 
{

date_default_timezone_set('Europe/Berlin');
$datum = strtotime($_POST['datum']);

$sql = "UPDATE fussball_uebungen.uebungen 
			SET titel='$_POST[titel]', datum='$datum', organisation='$_POST[organisation]', durchfuehrung='$_POST[durchfuehrung]', hinweise='$_POST[hinweise]', dauer='$_POST[laenge]', author='$_POST[author]', gruppierung='$_POST[gruppierung]', uebungsart='$_POST[uebungsart]'
			WHERE ID='$_GET[id]';";

mysqli_query($con,$sql) or die ("MySQL-Error: " . mysql_error());

/*echo"<pre>";
print_r($_FILES);
echo"</pre>";*/

if ($_FILES["files"]["error"][0] > 0){
		echo "Error: " . $_FILES["files"]["error"][0] . "<br />";
	}
else{
		echo "Upload: " . $_FILES["files"]["name"][0] . "<br />";
		echo "Type: " . $_FILES["files"]["type"][0] . "<br />";
		echo "Size: " . ($_FILES["files"]["size"][0] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["files"]["tmp_name"][0]."<br>";	
		
		if (file_exists("../upload/". $_FILES["files"]["name"][0]))
			{
				echo $_FILES["files"]["name"][0] . " already exists. ";
			}
		else
			{
				echo $_GET['id'].".jpg"."<br>";
				unlink($_GET['id'].".");
				move_uploaded_file($_FILES["files"]["tmp_name"][0],"../upload/" . $_GET['id'].".jpg");
				echo "Stored in: " . "./upload/" . $_GET['id'].".jpg";
			}
	}
header('Location:/index.php?page=2&art=uebungen');
exit();
}/*

**************************************************************
**************************************************************
**************************************************************
 ######  ########  #### ######## ##       ######## ########  
##    ## ##     ##  ##  ##       ##       ##       ##     ## 
##       ##     ##  ##  ##       ##       ##       ##     ## 
 ######  ########   ##  ######   ##       ######   ########  
      ## ##         ##  ##       ##       ##       ##   ##   
##    ## ##         ##  ##       ##       ##       ##    ##  
 ######  ##        #### ######## ######## ######## ##     ##
**************************************************************
**************************************************************
**************************************************************

*/
elseif ($_GET['art'] == "spieler") 
{
	
	$sql = "UPDATE fussball_uebungen.spieler
			SET name='$_POST[name]', vorname='$_POST[vorname]', strasse='$_POST[strasse]', hausnummer='$_POST[hausnummer]', PLZ='$_POST[PLZ]', stadt='$_POST[stadt]', vorwahl_festnetz='$_POST[vorwahl_festnetz]', telefon_nr='$_POST[telefon_nr]', vorwahl_handy='$_POST[vorwahl_handy]', handy_nr='$_POST[handy_nr]', pass_nr='$_POST[pass_nr]', id_position='$_POST[id_position]', staerken='$_POST[staerken]', schwaechen='$_POST[schwaechen]'
			WHERE SID='$_GET[id]';";

mysqli_query($con,$sql);

/*echo"<pre>";
print_r($_FILES);
echo"</pre>";
*/
if ($_FILES["files"]["error"][0] > 0)
	{
		echo "Error: " . $_FILES["files"]["error"][0] . "<br />";
	}
else
	{
		echo "Upload: " . $_FILES["files"]["name"][0] . "<br />";
		echo "Type: " . $_FILES["files"]["type"][0] . "<br />";
		echo "Size: " . ($_FILES["files"]["size"][0] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["files"]["tmp_name"][0]."<br>";	
		
		if (file_exists("../upload/spieler/". $_FILES["files"]["name"][0]))
			{
				echo $_FILES["files"]["name"][0] . " already exists. ";
			}
		else
			{
				echo $_GET['id'].".jpg"."<br>";
				unlink($_GET['id'].".jpg");
				move_uploaded_file($_FILES["files"]["tmp_name"][0],"../upload/spieler/" . $_GET['id'].".jpg");
				echo "Stored in: " . "../upload/spieler/" . $_GET['id'].".jpg";
			}
	}
/*header('Location:/index.php?page=2&art=spieler');
exit();*/
}/*

****************************************************
****************************************************
****************************************************
 ######  ########  #### ######## ##       ######## 
##    ## ##     ##  ##  ##       ##       ##       
##       ##     ##  ##  ##       ##       ##       
 ######  ########   ##  ######   ##       ######   
      ## ##         ##  ##       ##       ##       
##    ## ##         ##  ##       ##       ##       
 ######  ##        #### ######## ######## ########
****************************************************
****************************************************
****************************************************
*/
elseif($_GET['art'] == "spiele"){

echo "<pre>";
print_r($_POST);
echo "</pre>";

$datum = strtotime($_POST["datum"]);
$id = htmlentities($_GET['id']);
$spielbeginn = $datum + $_POST['spielbeginn_stunde']*3600 + $_POST['spielbeginn_minute']*60;
$treffzeit = $datum + $_POST['treffzeit_stunde']*3600 + $_POST['treffzeit_minute']*60;


	echo '<br />';
	echo $spielbeginn;
	echo '<br />';
	echo $treffzeit;
	echo '<br />';

$sql = "UPDATE spiele SET datum='".$datum."',
	spielbeginn='".$spielbeginn."',
	spielort='".$_POST['spielort']."',
	treffzeit='".$treffzeit."', 
	treffort='".$_POST['treffort']."', 
	heim='".$_POST['heim']."', 
	gast='".$_POST['gast']."' , 
	anmerkungen='".$_POST['anmerkungen']."', 
	spielart='".$_POST['spielart']."' 
	WHERE ID='$id'";
echo $sql;

mysqli_query($con,$sql) or die(mysqli_error($con));

header('Location:/index.php?page=6&art=spiele&cat=all&id='.$_GET['id']);
exit();
}

?>

