<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<table class="table table-bordered green">
	<?php
	for($i=97;$i<=104;$i++){
	echo "<tr>";
		for($j=1;$j<=5;$j++){
				echo "<td id=".chr($i).$j."><div></div></td>";
		}
	echo "</tr>";			
	}
	?>
</table> <!-- End of "aufstellung" -->

<?php
/* SQL Request for the player list */
$spieler = "SELECT id_spiel_id_spieler.id_spiel AS spiel,
						id_spiel_id_spieler.id_spieler AS spieler,
						id_spiel_id_spieler.position AS position,
						spiele.aufstellung AS aufstellung,
						spieler.name AS name,
						spieler.vorname AS vorname
						FROM id_spiel_id_spieler 
						LEFT JOIN spiele
						ON spiele.ID=id_spiel_id_spieler.id_spiel
						LEFT JOIN spieler
						ON spieler.SID=id_spiel_id_spieler.id_spieler
						WHERE spiele.ID=".$_GET['id']."";

$query_spieler = mysqli_query($con,$spieler);
while ($result_spieler = mysqli_fetch_array($query_spieler) or die (mysqli_error($con))) {
/*	echo '<pre>';
	print_r($result_spieler);
	echo '</pre>';*/

}
?>