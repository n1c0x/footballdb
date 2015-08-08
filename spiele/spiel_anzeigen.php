<?php
include('../header.php');
include('spiele_header.php');
$id = $_GET['id'];?>

	<div id="div_table_spiele_einzeln">
	<table id="table_spiele_einzeln">	
		<tr>
			<th id="table_spielbeginn"><b><u>Spielbeginn</th>
			<th id="table_spielort"><b><u>Spielort</th>
			<th id="table_treffzeit"><b><u>Treffzeit</th>
			<th id="table_treffort"><b><u>Treffort</th>
			<th class="table_ergebnis"><b><u>Ergebnis</th>
			<th class="table_ergebnis"><b><u>Halbzeitergebnis</th>
			<th></th>
		</tr>
		<tr style="background-color:#E2E2E2">
			<td><?php echo $row["2"] ?></td>
			<td><?php echo $row["3"] ?></td>
			<td><?php echo $row["4"] ?></td>
			<td><?php echo $row["5"] ?></td>
			<td><?php echo $row["11"] ?>:<?php echo $row["12"] ?></td>
			<td><?php echo $row["10"] ?></td>
			<td width="50px">
				<a href="aendern_spiel.php?id=<?php echo $row['0']?>" >
					<img src='../bilder/alter.png' width="30px" height="30px" />
				</a>
				<a href = "loesche_spiel.php?id=<?php echo $row['0'] ?>&art=uebungen" onclick="if (!confirm('Wollen Sie wirklich den Eintrag löschen?')) {return false;} "; >
					<img src='../bilder/delete.png' width="30px" height="30px" />
				</a>
			</td>
		</tr>
	</table>
	</div>
	<div id="div_table_tore_anzeigen">
	<table id="table_tore_anzeigen">
		<tr>
			<th>Minute</th>
			<th>Torsch&uuml;tze</th>
			<th>Torart</th>
		</tr>
	<?php
$tore = $row['11'] + $row['12'];

$sql3 = "SELECT COUNT(*) from tore WHERE tore.spiele_id=".$_GET['id']."";
$result = mysql_query($sql3);
$row = mysql_fetch_array($result);
	$u=1;
	while($data = mysql_fetch_array($sql2)){
		echo '<tr>
			<td>'.$data['2'].' Min.</td>
			<td id="torschuetze_anzeigen">'.$data['7'].' '.$data['6'].'</td>
			<td>'.$data['21'].'</td>
		</tr>';

	}
		if ($tore != $row['0'] ){
			$u=2;
			echo'</table>';
		}
		else{
			$u=5;
			echo'</table>';
		}
	?>
</div>

<div id="ergebnis_link"><a onclick="changeDiv('ergebnis_aendern');" id="link_ergebnis">Ergebnis &Auml;ndern</a></div>
        
        <div id="ergebnis_aendern" style="height:150px;width:310px;display:none;overflow:hidden;">
			<div id="ergebnis_spiel">	
			<form action="formular_ergebnis.php?id=<?php $id = $_GET['id']; echo $id; ?>" method="POST">
				<table>
					<tr>
						<td>Halbzeit:</td>
						<td>
							<input type="text" name="halbzeit_heim" maxlength=2 ></td>
						<td>:</td>
						<td>
							<input type="text" name="halbzeit_gast" maxlength=2/></td>
					</tr>
					<tr>
						<td>Endergebnis:</td>
						<td>
							<input type="text" name="endergebnis_heim" maxlength=2 ></td>
						<td>:</td>
						<td>
							<input type="text" name="endergebnis_gast" maxlength=2/></td>
					</tr>
				</table>
				<input type="submit" value="Senden" id="ergebnis_submit" />		
			</form>
			</div>
		</div>

<?php

if ($u == 1 || $u == 2) {
$counter=1;
$endergebnis= $tore;

$id = $_GET['id'];

if (isset ($endergebnis)) {

	echo'		<form action="formular_tor.php?id='.$id.'" method="POST" id="tor_hinzufuegen">
				<div id="tor_minute">';

$j=1;

if ($counter <= $endergebnis) {
echo '<p id="ueberschrift_tore"><b><u>Tore:</u></b><p>';
}
while ($counter <= $endergebnis)
{
	if ($counter <= $endergebnis) {
		echo '<hr>';
			}		
	echo'		

						<label>'.$counter.'. Tor: </label><select name="minute'.$j.'">';
	echo '<optgroup label="1. Halbzeit">';
	for($i=1;$i<46;$i++){	
		
		echo '<option value="'.$i.'">';
		echo $i." Min.";
		echo '</option>';

	}
	echo '</optgroup>';
	echo '<optgroup label="2. Halbzeit">';
	for($i=46;$i<91;$i++){	
		echo '<option>';
		echo $i." Min.";
		echo '</option>';

	}
		echo '</optgroup>';
		echo'</select><select name="torschuetze'.$j.'">';

		$sql="SELECT * FROM spieler";
		$result =mysql_query($sql);
		echo '<option value="0"></option>';

		while($row = mysql_fetch_array($result)){
			echo '
			<option value="'.$row['0'].'">'.$row['2'].' '.$row['1'].'</option>';

		}
		echo'</select>';
		echo '<select name="torart'.$j.'">';

		$sql="SELECT * FROM torart";
		$result =mysql_query($sql);
		echo '<option value="0"></option>';

		while($row = mysql_fetch_array($result)){
			echo '
			<option value="'.$row['0'].'">'.$row['1'].'</option>';
		}

		echo '</select>';
		$counter++;
		$j++;
}
		if ($endergebnis != 0) 
		{
			echo'<hr><input type="submit" name="submit" id="submit_minute" />';
		}

	echo'	
			<input type="text" hidden name="spiele_id" value="'.$_GET['id'].'" />
			<input type="text" hidden name="ergebnis" value="'.$endergebnis.'" />
			</form>


				</div>';


}
}
include('../footer.php');

if ($u == 2)
{
		echo 	'<script type="text/javascript">
					alert("Anzahl der Tore stimmt nicht mit dem Ergebnis überein!");
					</script>';
}
?>