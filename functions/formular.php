
<?php
include("../connect.php");
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
if($_GET['art'] == "uebungen")
{


	$datum = strtotime($_POST['datum']);
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	mysqli_query($con,"INSERT INTO fussball_uebungen.uebungen
	(titel,datum,organisation,durchfuehrung,hinweise,dauer,author,gruppierung,uebungsart) 
	VALUES (
	'$_POST[titel]',
	'$datum',
	'$_POST[organisation]',
	'$_POST[durchfuehrung]',
	'$_POST[hinweise]',
	'$_POST[laenge]',
	'$_POST[author]',
	'$_POST[gruppierung]',
	'$_POST[uebungsart]')") or die ("MySQL-Error: " . mysql_error());

	$id = mysqli_insert_id($con);

	/* File Upload */

	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
	echo $id;

	if ($_FILES["files"]["error"][0] > 0){
			echo "Error: " . $_FILES["files"]["error"][0] . "<br />";
		}
	else{
	echo "Upload: " . $_FILES["files"]["name"][0] . "<br />";
	echo "Type: " . $_FILES["files"]["type"][0] . "<br />";
	echo "Size: " . number_format(($_FILES["files"]["size"][0] / 1024)) . " Kb<br />";
	echo "Stored in: " . $_FILES["files"]["tmp_name"][0]."<br>";	

	if (file_exists("../upload/". $_FILES["files"]["name"][0])){
			echo $_FILES["files"]["name"][0] . " already exists. ";
		}
			else{
			move_uploaded_file($_FILES["files"]["tmp_name"][0],"../upload/" . $id.".jpg");
			echo "Stored in: " . "./upload/" . $id.".jpg";
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
elseif ($_GET['art'] == "spieler"){

echo "<pre>";
print_r($_POST);
echo "</pre>";

	mysqli_query($con,"INSERT INTO fussball_uebungen.spieler
	(name, vorname, strasse, hausnummer, PLZ, stadt, vorwahl_festnetz, telefon_nr, vorwahl_handy, handy_nr, pass_nr, id_position, staerken, schwaechen) 
	VALUES (
	'$_POST[name]',
	'$_POST[vorname]',
	'$_POST[strasse]',
	'$_POST[hausnummer]',
	'$_POST[PLZ]',
	'$_POST[stadt]',
	'$_POST[vorwahl_festnetz]',
	'$_POST[telefon_nr]',
	'$_POST[vorwahl_handy]',
	'$_POST[handy_nr]',
	'$_POST[pass_nr]',
	'$_POST[id_position]',
	'$_POST[staerken]',
	'$_POST[schwaechen]')");


$id = mysqli_insert_id($con);
echo "<br>id: ".$id."<br>";

/* File Upload */


if ($_FILES["files"]["error"][0] > 0)
	{
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		// echo "Error: " . $_FILES["files"]["error"][0] . "<br />";
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
				move_uploaded_file($_FILES["files"]["tmp_name"][0],"../upload/spieler/" . $id.".jpg");
				echo "Stored in: " . "./upload/spieler/" . $id.".jpg";
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
*######  ##        #### ######## ######## ########
****************************************************
****************************************************
****************************************************
*/
elseif ($_GET['art'] == "spiele"){

$sql3 = mysqli_query($con,"SELECT * FROM spiele
	 						LEFT JOIN spielart
							ON spiele.spielart = spiele.ID");
						
	$res = mysqli_fetch_array($sql3);

	if(strlen($_POST['spielbeginn_stunde']) < 2) {$_POST['spielbeginn_stunde'] = '0'.$_POST['spielbeginn_stunde'];}
	if(strlen($_POST['spielbeginn_minute']) < 2) {$_POST['spielbeginn_minute'] = '0'.$_POST['spielbeginn_minute'];}
	if(strlen($_POST['treffzeit_stunde']) < 2) {$_POST['treffzeit_stunde'] = '0'.$_POST['treffzeit_stunde'];}
	if(strlen($_POST['treffzeit_minute']) < 2) {$_POST['treffzeit_minute'] = '0'.$_POST['treffzeit_minute'];}

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

	$datum = strtotime($_POST['datum']);
	$spielbeginn = $datum + $_POST['spielbeginn_stunde']*3600 + $_POST['spielbeginn_minute']*60;
	$treffzeit = $datum + $_POST['treffzeit_stunde']*3600 + $_POST['treffzeit_minute']*60;

	$beginn = $_POST['spielbeginn_stunde'] * 60 + $_POST['spielbeginn_minute'];
	$treff = $_POST['treffzeit_stunde'] * 60 + $_POST['treffzeit_minute'];

	if($treff > $beginn){
		echo '<script type="text/javascript">
				alert("Treffzeit muss vor Spielgebinn sein");
				</script>';

		echo "
		<form action=\"spiele_hinzufuegen_full.php\" method=\"POST\">
			<input name=\"spielbeginn_stunde\" type=\"hidden\" value='".$_POST['spielbeginn_stunde']."'/></p>
			<input name=\"spielbeginn_minute\" type=\"hidden\" value='".$_POST['spielbeginn_minute']."' /></p>
			<input name=\"spielort\" type=\"hidden\" value='".$_POST['spielort']."' /></p>
			<input name=\"treffort\" type=\"hidden\" value='".$_POST['treffort']."' /></p>
			<input name=\"treffzeit_stunde\" type=\"hidden\" value='".$_POST['treffzeit_stunde']."'/></p>
			<input name=\"treffzeit_minute\" type=\"hidden\" value='".$_POST['treffzeit_minute']."' /></p>
			<input name=\"heim\" type=\"hidden\" value='".$_POST['heim']."' /></p>
			<input name=\"gast\" type=\"hidden\" value='".$_POST['gast']."' /></p>
			<input name=\"spielart\" type=\"hidden\" value='".$_POST['spielart']."' /></p>
			<input name=\"anmerkungen\" type=\"hidden\" value='".$_POST['anmerkungen']."' /></p>
			<input name=\"Tag\" type=\"hidden\" value='".$_POST['Tag']."' /></p>
			<input name=\"Monat\" type=\"hidden\" value='".$_POST['Monat']."' /></p>
			<input name=\"jahr\" type=\"hidden\" value='".$_POST['jahr']."' /></p>

			<input type=\"submit\" name=\"zur&uuml;ck\" value=\"Zurück\" />
		</form>
		";
	}
	else{

		$sql = "INSERT INTO fussball_uebungen.spiele
		(datum,spielbeginn,spielort,treffzeit,treffort,heim,gast,anmerkungen,spielart) 
		VALUES (
		'$datum',
		'$spielbeginn',
		'$_POST[spielort]',
		'$treffzeit',
		'$_POST[treffort]',
		'$_POST[heim]',
		'$_POST[gast]',
		'$_POST[anmerkungen]',
		'$_POST[spielart]')";
		
		mysqli_query($con,$sql) or die ("MySQL-Error: " . mysql_error());
		
	}

header('Location:/index.php?page=2&art=spiele');
exit();
}/*
********************************************************************
********************************************************************
********************************************************************
######## ########     ###    #### ##    ## #### ##    ##  ######   
   ##    ##     ##   ## ##    ##  ###   ##  ##  ###   ## ##    ##  
   ##    ##     ##  ##   ##   ##  ####  ##  ##  ####  ## ##        
   ##    ########  ##     ##  ##  ## ## ##  ##  ## ## ## ##   #### 
   ##    ##   ##   #########  ##  ##  ####  ##  ##  #### ##    ##  
   ##    ##    ##  ##     ##  ##  ##   ###  ##  ##   ### ##    ##  
*  ##    ##     ## ##     ## #### ##    ## #### ##    ##  ###### 
********************************************************************
********************************************************************
 *******************************************************************
*/
elseif ($_GET['art'] == "training"){

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/


	$uebungen = $_POST['uebungen'];
	$spieler = $_POST['spieler'];
	$datum = strtotime($_POST['datum']);


	$sql = "INSERT INTO training (datum) VALUES ('$datum')";
	mysqli_query($con,$sql);

	$sql = "SELECT MAX(training.id) from fussball_uebungen.training";
	mysqli_query($con,$sql);

	$result_max_training_id = mysqli_fetch_array(mysqli_query($con,$sql));
	$max_training_id = $result_max_training_id[0];

	foreach ($uebungen as $key => $value) {
		$sql = "INSERT INTO id_training_id_uebungen(id_training,id_uebungen) VALUES ('".$max_training_id."','".$uebungen[$key]."')";
		mysqli_query($con,$sql) or die(mysqli_error($con));
	}
	foreach ($spieler as $key => $value) {
		$sql = "INSERT INTO id_training_id_spieler(id_training,id_spieler) VALUES ('".$max_training_id."','".$spieler[$key]."')";
		mysqli_query($con,$sql) or die(mysqli_error($con));
	}

	header('Location:/index.php?page=2&art=training');
	exit();
}/*
***************************************
***************************************
***************************************
########  #######  ########  ######## 
   ##    ##     ## ##     ## ##       
   ##    ##     ## ##     ## ##       
   ##    ##     ## ########  ######   
   ##    ##     ## ##   ##   ##       
   ##    ##     ## ##    ##  ##       
   ##     #######  ##     ## ######## 
***************************************
***************************************
***************************************

*/
elseif($_GET['art'] == 'tore'){

	$id = htmlentities($_GET['id']);

	echo 'id: '.$_GET['id'].'<br>';
	?>
	<pre>
		<?php print_r($_POST); ?>
	</pre>
	<?php

	$counter=1;

	$sql= 'DELETE FROM fussball_uebungen.tore WHERE spiele_id='.$_GET["id"].'';
	$result = mysqli_query($con,$sql) or die (mysqli_error($con));

	echo $_POST['minute1'];
	echo $_POST['torschuetze1'];
	echo $_POST['torart1'];
	echo $_POST['spiele_id'];
	while ($counter <= $_POST['ergebnis'])
	{
		$sql= 'INSERT INTO fussball_uebungen.tore (torschuetze, minute, torart, spiele_id) 
		VALUES ("'.$_POST['torschuetze'.$counter.''].'",
			"'.$_POST['minute'.$counter.''].'",
			"'.$_POST['torart'.$counter.''].'",
			"'.$_POST['spiele_id'].'")';
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
		$counter++;
	}
	
header('Location:http://localhost/index.php?page=6&art=spiele&cat=all&id='.$id);
exit();
}


?>
