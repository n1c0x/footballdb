<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="refresh" content="0; URL=spiel_anzeigen.php?id=<?php echo $_GET['id'] ; ?>">
</head>
<body>

<?php

//open a connection to a sql server
include('../connect.php');

$datum = strtotime(date($_POST['jahr']."-".$_POST['Monat']."-".$_POST['Tag']));
$id = $_GET['id'];


	if(strlen($_POST['spielbeginn_stunde']) < 2) {$_POST['spielbeginn_stunde'] = '0'.$_POST['spielbeginn_stunde'];}
	if(strlen($_POST['spielbeginn_minute']) < 2) {$_POST['spielbeginn_minute'] = '0'.$_POST['spielbeginn_minute'];}
	if(strlen($_POST['treffzeit_stunde']) < 2) {$_POST['treffzeit_stunde'] = '0'.$_POST['treffzeit_stunde'];}
	if(strlen($_POST['treffzeit_minute']) < 2) {$_POST['treffzeit_minute'] = '0'.$_POST['treffzeit_minute'];}

	$spielbeginn=$_POST['spielbeginn_stunde'].":".$_POST['spielbeginn_minute'];
	$treffzeit=	$_POST['treffzeit_stunde'].":".$_POST['treffzeit_minute'];
	$spieler = implode(",", $_POST['spieler']);

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
	spielart='".$_POST['spielart']."',
	vorhandene_spieler='".$spieler."' 
	WHERE ID='$id'";
echo $sql;

mysql_query($sql) or die(mysql_error());

?>
</body>
</html>