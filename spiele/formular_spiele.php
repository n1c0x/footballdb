<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>


<?php

include('../connect.php');

	$sql3 = mysql_query("SELECT * FROM spiele
	 						LEFT JOIN spielart
							ON spiele.spielart = spiele.ID");
						
	$res = mysql_fetch_array($sql3);

	if(strlen($_POST['spielbeginn_stunde']) < 2) {$_POST['spielbeginn_stunde'] = '0'.$_POST['spielbeginn_stunde'];}
	if(strlen($_POST['spielbeginn_minute']) < 2) {$_POST['spielbeginn_minute'] = '0'.$_POST['spielbeginn_minute'];}
	if(strlen($_POST['treffzeit_stunde']) < 2) {$_POST['treffzeit_stunde'] = '0'.$_POST['treffzeit_stunde'];}
	if(strlen($_POST['treffzeit_minute']) < 2) {$_POST['treffzeit_minute'] = '0'.$_POST['treffzeit_minute'];}


	$datum = strtotime($_POST['jahr']."-".$_POST['Monat']."-".$_POST['Tag']);
	$spielbeginn = $_POST['spielbeginn_stunde'].":".$_POST['spielbeginn_minute'];
	$treffzeit =	$_POST['treffzeit_stunde'].":".$_POST['treffzeit_minute'];

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

			<input type=\"submit\" name=\"zurück\" value=\"Zurück\" />
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
	
	mysql_query($sql) or die ("MySQL-Error: " . mysql_error());
	$link = "<meta http-equiv=\"refresh\" content=\"0; URL=uebersicht_spiele.php\">";
}
echo $link;
?>	

</body></html>
