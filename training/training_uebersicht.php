<?php
$sql = "SELECT training.id AS id,
				training.datum AS datum,
				training.spieler AS spieler,
				training.uebungen AS uebungen,
				spieler.name AS name, 
				spieler.vorname AS vorname,
				uebungen.titel AS titel
					from training
						LEFT JOIN spieler
						ON training.spieler = spieler.SID
						LEFT JOIN uebungen
						ON training.uebungen = uebungen.ID";

$result = mysql_query($sql);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

while($row = mysql_fetch_array($result))
{
	$spieler = explode(",",$row['spieler']);
	$uebungen = explode(",",$row['uebungen']);

	// echo "<pre>";
	// print_r($spieler);
	// echo "</pre>";

	$row3 = array();
	$gruppierung1 = array();
	$gruppierung2 = array();
	$gruppierung3 = array();

	for($i=0;$i<count($uebungen);$i++){
		$sql_1 = "SELECT uebungen.titel,uebungen.dauer,gruppierung.name from uebungen LEFT JOIN gruppierung ON uebungen.gruppierung = gruppierung.ID where uebungen.ID='".$uebungen[$i]."' AND uebungen.gruppierung=1";
		$result_1 = mysql_query($sql_1);
		$gruppierung1 = mysql_fetch_array($result_1);
		$row3['uebung_titel_1'.$i.''] = $gruppierung1[0];
		$row3['uebung_dauer_1'.$i.''] = $gruppierung1[1];
		$row3['gruppierung_1'.$i.''] = $gruppierung1[2];
		//print_r($gruppierung1);

		$sql_2 = "SELECT uebungen.titel,uebungen.dauer,gruppierung.name from uebungen LEFT JOIN gruppierung ON uebungen.gruppierung = gruppierung.ID where uebungen.ID='".$uebungen[$i]."' AND uebungen.gruppierung=2";
		$result_2 = mysql_query($sql_2);
		$gruppierung2 = mysql_fetch_array($result_2);
		$row3['uebung_titel_2'.$i.''] = $gruppierung2[0];
		$row3['uebung_dauer_2'.$i.''] = $gruppierung2[1];
		$row3['gruppierung_2'.$i.''] = $gruppierung2[2];
		//print_r($gruppierung2);

		$sql_3 = "SELECT uebungen.titel,uebungen.dauer,gruppierung.name from uebungen LEFT JOIN gruppierung ON uebungen.gruppierung = gruppierung.ID where uebungen.ID='".$uebungen[$i]."' AND uebungen.gruppierung=3";
		$result_3 = mysql_query($sql_3);
		$gruppierung3 = mysql_fetch_array($result_3);
		$row3['uebung_titel_3'.$i.''] = $gruppierung3[0];
		$row3['uebung_dauer_3'.$i.''] = $gruppierung3[1];
		$row3['gruppierung_3'.$i.''] = $gruppierung3[2];

	}
	//print_r($gruppierung1);
	print_r($gruppierung2);
	for($i=0;$i<count($spieler);$i++){
		$sql = "SELECT spieler.name, spieler.vorname from spieler where SID='".$spieler[$i]."'";
		$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2) or die (mysql_error());
		
		$row3['spieler_name'.$i.''] = $row2[0];
		$row3['spieler_vorname'.$i.''] = $row2[1];

	}

	?>

	<div id="titel_der_uebung">
		<div class="datum">Datum: <?php echo date("d-m-Y",$row['datum'])?> 
		</div> <!-- End of "datum" -->
		
		<div class="beteiligte_uebungen">
			<h3>&Uuml;bungen:</h3>
			<h4>Einstimmen/Aufw&auml;rmen</h4>
				<table>
				<?php 
				for($i=0;$i<count($gruppierung1);$i++){
					echo "<tr><td>";
					if($gruppierung1[$i]!=""){
						echo "<a href=\"./anzeigen.php?id=".$uebungen[$i]."\" target=\"_blank\" >".$row3["uebung_titel_1".$i]."</a></td><td> ".$row3["uebung_dauer_1".$i]." Min";
					}else{echo "blah";}
					echo "</td></tr>";
				}?>
				</table>
			<h4>Hauptteil</h4>
				<table>
				<?php 
				for($i=0;$i<count($gruppierung2)/2;$i++){
					echo "<tr><td>";
						if($gruppierung2[$i]!=""){
							echo "<a href=\"./anzeigen.php?id=".$uebungen[$i]."\" target=\"_blank\" >".$row3["uebung_titel_2".$i]."</a></td><td> ".$row3["uebung_dauer_2".$i]." Min";	
						}else{echo "blah";}
					echo "</td></tr>";
				}?>
				</table>
			<h4>Schlu&szlig;teil</h4>
				<table>
				<?php 
				for($i=0;$i<count($gruppierung3)/2;$i++){
					echo "<tr><td>";
					if($gruppierung3[$i]!=""){
						echo "<a href=\"./anzeigen.php?id=".$uebungen[$i]."\" target=\"_blank\" >".$row3["uebung_titel_3".$i]."</a></td><td> ".$row3["uebung_dauer_3".$i]." Min";
					}else{echo "blah";}
					echo "</td></tr>";
				}?>
				</table>
		</div> <!-- End of "beteiligte_uebungen" -->

		<div class="beteiligte_spieler">
			<h3>Spieler:</h3>
			<table>
				<tr>
			<?php
			for($i=0;$i<count($spieler);$i++){
				echo "<td><a href=\"../uebersicht.php?art=spieler\" target=\"_blank\">".$row3["spieler_vorname".$i]." ".$row3["spieler_name".$i]."</a>";
				if($i%2!=0){
				echo "</td></tr><tr>";
				}
				else{
					echo "</td>";
				}
			}?>
				<tr>
			</table>
		</div> <!-- End of "beteiligte_spieler" -->
		<a href="training_aendern.php?id="<?php echo $row['id']?>""><u>Training &auml;ndern</u></a>
	</div> <!-- End of "titel_der_uebung" -->
<?php } ?>
