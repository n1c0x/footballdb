<?php

$summe = $_POST['endergebnis_heim'] + $_POST['endergebnis_gast'];

echo '<meta http-equiv="refresh" content="0; URL=spiel_anzeigen.php?id='.$_GET['id'].'"> ';

include ('../connect.php');

$hze = $_POST['halbzeit_heim'].':'.$_POST['halbzeit_gast'];
$ee_heim = $_POST['endergebnis_heim'];
$ee_gast = $_POST['endergebnis_gast'];

	$sql= 'UPDATE fussball_uebungen.spiele set halbzeitergebnis="'.$hze.'", ergebnis_heim="'.$ee_heim.'", ergebnis_gast="'.$ee_gast.'" WHERE ID="'.$_GET['id'].'"';
	$result = mysql_query($sql);
?>