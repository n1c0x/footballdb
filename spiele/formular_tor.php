<?php

echo '<meta http-equiv="refresh" content="0; URL=spiel_anzeigen.php?id='.$_GET['id'].'"> ';
	include ('connect.php');
$counter=1;

	$sql= ' DELETE FROM fussball_uebungen.tore WHERE spiele_id='.$_GET["id"].'';
	$result = mysql_query($sql) or die (mysql_error());

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
		$result = mysql_query($sql) or die (mysql_error());
		$counter++;
	}


?>