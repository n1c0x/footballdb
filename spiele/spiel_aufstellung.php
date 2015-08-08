<?php
include('../header.php');
include('spiele_header.php');?>

<a id="aufstellung_erstellen" href="aufstellung_erstellen.php?id=<?php echo $_GET['id'];?>">
Aufstellung eintragen/&auml;ndern
</a>

<?php
/* SQL Request for the player list */
$sql_spieler = "SELECT spiele.vorhandene_spieler AS spieler from spiele where ID=".$_GET['id']."";
$result_spieler = mysql_fetch_array(mysql_query($sql_spieler)) or die (mysql_error());
$spieler = explode(",",$result_spieler[0]);

/* SQL Request for the position */
$sql_aufstellung = "SELECT spiele.aufstellung from spiele where ID=".$_GET['id']."";
$result_aufstellung = mysql_fetch_array(mysql_query($sql_aufstellung)) or die (mysql_error());
$aufstellung = explode(",",$result_aufstellung[0]);


for($i=0;$i<count($aufstellung);$i++){
	if($aufstellung[$i]!=0){
		$position[$i] = $aufstellung[$i];
	}

}

for($i=0;$i<=count($aufstellung);$i++){
	if(isset($position[$i])){
		$sql_position_spieler = "SELECT spieler.name, spieler.vorname from spieler where SID=".$position[$i]."";
		$result_position_spieler = mysql_fetch_array(mysql_query($sql_position_spieler)) or die (mysql_error());
		$position_spieler_name[] = substr($result_position_spieler['name'], 0,2);
		$position_spieler_vorname[] = $result_position_spieler['vorname'];
	}
}

?>
<!-- building of the table with he position of the players -->
<table id="aufstellung">
	<?php
	$counter=0;
	for($j=1;$j<=11;$j++){
	echo "<tr>";
		for($k1=1;$k1<=9;$k1++){
			if(isset($position[$j.$k1-10])){
				echo "<td class='spieler_position'><div class='box_spieler'>".$position_spieler_vorname[$counter]." ".$position_spieler_name[$counter].".</div></td>";
				$counter++;
			}
			else{echo "<td></td>";}
		}
	echo "</tr>";			
	}
	?>
</table> <!-- End of "aufstellung" -->

</article>

<?php include('../footer.php');?>