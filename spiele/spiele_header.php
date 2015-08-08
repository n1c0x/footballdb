<?php	
	$sql=mysql_query("SELECT * FROM spiele 
					  LEFT JOIN spielart 
					  ON spiele.spielart = spielart.ID 
					  WHERE spiele.ID=".$_GET['id']."");

	$row = mysql_fetch_array($sql);


	$sql2=mysql_query("SELECT * FROM tore
					  LEFT JOIN spieler 
					  ON tore.torschuetze = spieler.SID 
					  LEFT JOIN torart
					  ON tore.torart = torart.id
					  WHERE tore.spiele_id=".$_GET['id']."
					  ORDER BY minute ASC") or die (mysql_error());
?>
<article>
	<?php
	echo '<h2 id="spiel_anzeigen">'.$row['16'].' am '.date('d.m.Y',$row['1']).'</h2>';

	echo '<h3>'.$row["6"].' - '.$row["7"].' </h3>';

	?>
		<br />
		<div id="div_table_anzeigen">
		<table id="table_anzeigen">
			<tr>
				<td><a href="spiel_anzeigen.php?id=<?php echo $row[0]?>">Allgemein</a></td>
				<td><a href="spiel_aufstellung.php?id=<?php echo $row[0]?>">Aufstellung</td>
				<td><a href="spiel_anmerkung.php?id=<?php echo $row[0]?>&art=anzeigen">Anmerkung</td>
			</tr>
		</table> <!-- End of "table_anzeigen" -->
		</div> <!-- End of "div_table_anzeigen" -->