<?php
$sort='';
if(isset($_GET['sort'])) {
  $sort = $_GET['sort'];
}

if($sort=='' || $sort=='datum'){
$sql = "SELECT * FROM spiele 
				LEFT JOIN spielart 
				ON spiele.spielart = spielart.ID ORDER BY datum asc ";
}
elseif($sort=='spielart'){
$sql = "SELECT * FROM spiele 
					LEFT JOIN spielart 
					ON spiele.spielart = spielart.ID ORDER BY spielart asc ";
}

$result = mysql_query($sql);
	?>
		<div>
		<h2>Spiele</h2><br /><br />
			<table>
				<tr>
					<th class="clear"></th>
					<th id="table_art"><a href="uebersicht_spiele.php?sort=spielart">Spielart &darr;</a></th>
					<th id="table_datum"><a href="uebersicht_spiele.php?sort=datum">Datum &darr;</a></th>
					<th id="table_spielbeginn">Spielbeginn</th>
					<th id="table_spielort">Spielort</th>
					<th id="table_treffzeit">Treffzeit</th>
					<th id="table_treffort">Treffort</th>
					<th id="table_heimmannschaft">Heimmannschaft</th>
					<th id="table_gastmannschaft">Gastmannschaft</th>
					<th id="table_ergebnis">Ergebnis</th>
					<th></th>
				</tr>
	<?php
	$i = 0;
	while($row = mysql_fetch_array($result))
	{
		if($i%2==0)
			{echo "<tr class=\"alt\">";}
		else 
			{echo "<tr class=\"normal\">";}
			echo '
			<td class="clear"><a href="spiel_anzeigen.php?id='.$row[0].'"><img src="../bilder/ball.png" width=40px></a></td>
			<td>'.$row["16"].'</td>
			<td>'.date('d.m.Y',$row['1']).'</td>
			<td>'.$row["2"].'</td>
			<td>'.$row["3"].'</td>
			<td>'.$row["4"].'</td>
			<td>'.$row["5"].'</td>
			<td>'.$row["6"].'</td>
			<td>'.$row["7"].'</td>
			<td>'.$row["11"].':'.$row["12"].'</td>
			<td>
			<a href=\'aendern_spiel.php?id='.$row["0"].'\'>
				<img src=\'../bilder/alter.png\' width="30px" height="30px" />
			</a> 
			<a href = "loesche_spiel.php?id='.$row[0].'&art=uebungen" onclick="if (!confirm(\'Wollen Sie wirklich den Eintrag löschen?\')) {return false;} ;" >
			<img src=../bilder/delete.png width="30px" height="30px" />
			</a>
			</td>
		</tr>';
		$i++;
	}?>
	</table>
</div>