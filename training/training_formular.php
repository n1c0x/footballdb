<?php include("../connect.php"); ?>
<?php
echo '<meta http-equiv="refresh" content="0; URL=training_uebersicht.php">';

print_r($_POST)."<br>";

$uebungen = implode(",", $_POST['uebungen']);
$spieler = implode(",", $_POST['spieler']);
echo $uebungen."<br>";
echo $spieler."<br>";

$datum = strtotime(date('Y')."-".$_POST['Monat']."-".$_POST['Tag']);
$sql = "INSERT INTO training (datum,spieler,uebungen) VALUES ('$datum','$spieler','$uebungen')";
//echo $sql;
mysql_query($sql);

?>