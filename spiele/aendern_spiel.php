<?php include('../header.php');

	$sql = "SELECT * FROM spiele Where ID=".$_GET['id']."";
	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
	$spielbeginn = explode (':', $row['2']);
	$treffzeit = explode (':', $row['4']);	
	$spielort= $row["3"];
	$treffpunkt= $row["5"];
	$heim= $row["6"];
	$gast= $row["7"];
	$anmerkung= $row["8"];
	$datum = $row['1'];
	$spielart=$row['9'];
	$tag = date('d',$datum);
	$monat = date('n',$datum);
	$jahr = date('Y',$datum);
	}
?>
<div id="div_spiele_hinzufuegen">
	<h2>Spiel bearbeiten</h2><br /><br />
		<table id="table_spiele_hinzufuegen">	
			<tr>
				<th>Spielbeginn</th>
				<th>Spielort</th>
				<th>Treffzeit</th>
				<th>Treffort</th>
				<th>Heimmannschaft</th>
				<th>Gastmannschaft</th>
				<th>Spielart</th>
			</tr>
			<tr>
				<form name="spiele" method="POST" action="bearbeiten_spiel.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
				<td>
					<table id="inner_table">
						<tr>
							<td><select name="spielbeginn_stunde">
								<?php
								for($i=0;$i<=23;$i++){
										if ($i == $spielbeginn['0']){
											echo "<option value=".$i." selected ='selected'>".$i."</option>";
										}
										else{
										echo "<option value=".$i.">".$i."</option>";
										}
									}?>
								</select>
							</td>
							<td>:</td>
							<td><select name="spielbeginn_minute">
								<?php	
								for($i=0;$i<=59;$i++){
										if ($i == $spielbeginn['1']){
											echo "<option value=".$i." selected ='selected'>".$i."</option>";
										}
										else{
										echo "<option value=".$i.">".$i."</option>";
										}
									}
							echo '</select></td>';
							?>

						</tr>
					</table>
				</td>
				<?php echo'	
				<td><input type="text" name ="spielort" value="'.$spielort.'" /></td>' ?>
				<td>
					<table id="inner_table">
						<tr><?php echo '
							<td><select name="treffzeit_stunde">';
								for($i=0;$i<=23;$i++){
										if ($i == $treffzeit['0']){
											echo "<option value=".$i." selected ='selected'>".$i."</option>";
										}
										else{
										echo "<option value=".$i.">".$i."</option>";
										}
									}
							echo '</select></td>
							<td>:</td>
							<td><select name="treffzeit_minute">';
								
								for($i=0;$i<=59;$i++){
										if ($i == $treffzeit['1']){
											echo "<option value=".$i." selected ='selected'>".$i."</option>";
										}
										else{
										echo "<option value=".$i.">".$i."</option>";
										}
									}
							echo '</select></td>';
							?>

						</tr>
					</table>
				</td>
				<?php echo  '
				<td><input type="text" name ="treffort" value="'.$treffpunkt.'" /></td>
				<td><input type="text" name ="heim" value="'.$heim.'" /></td>
				<td><input type="text" name ="gast" value="'.$gast.'" /></td>
				<td>';
					$sql = "SELECT * FROM spielart";
					$result = mysql_query($sql); ?>

					<select name="spielart">
					<?php
					$counter = 1;			
					while($row = mysql_fetch_array($result))
						{
						if ($row['0'] == $spielart){
							echo "<option value=".$counter." selected='selected'>".$row['1']."</option>";
						}
						else{
						echo "<option value=".$counter.">".$row['1']."</option>";
						}				
						$counter++;
						}
					?>
					</select>
				</td>
			</tr>					

		</table><br />
		<div id="datum_spiele_aendern">
			<label>Datum:</label>	
			<select name="Tag">
				<option selected></option>
					<?php
					for($i=1;$i<=31;$i++){
							if ($i == $tag){
								echo "<option value=".$i." selected ='selected'>".$i."</option>";
							}
							else{
							echo "<option value=".$i.">".$i."</option>";
							}
						}?>
				</select>
				<?php
				$sql = "SELECT monat.Monat FROM monat";
				$result = mysql_query($sql); ?>

			<select name="Monat">
				<?php
				$counter = 1;			
				while($row = mysql_fetch_array($result)){
					if ($counter == $monat) {
						echo "<option value=".$counter." selected='selected'>".$row['Monat']."</option>";
						}
						else{
						echo "<option value=".$counter.">".$row['Monat']."</option>";
						}
					$counter++;}?>

			</select>
			<select name="jahr">
				<?php
					for($i=date('Y');$i<=date('Y')+10;$i++){
							if ($i == $jahr){
								echo "<option value=".$i." selected ='selected'>".$i."</option>";
							}
							else{
							echo "<option value=".$i.">".$i."</option>";
							}
						}?>
			</select>
		</div>
		
		<p><b>Anmerkungen:</b></p>

		<?php echo '<textarea name="anmerkungen" id="anmerkungen_textarea">'.$anmerkung.'</textarea>';
		
$sql = "SELECT spieler.SID,spieler.vorname,spieler.name FROM spieler";
$result = mysql_query($sql);
$counter = 0;
?>
<div id="anwesender_spieler">
	<h3>Anwesende Spieler</h3>
		<table>
				<?php
				while($row = mysql_fetch_array($result))
				{
				$sid = $row['SID'];
				echo "<tr><td>";
				echo $row['vorname'] . " " . $row['name']."</td><td><input class=\"ist_anwesend\" type=\"checkbox\" name=\"spieler[]\" value=\"$sid\" checked=\"checked\">";
				echo "</td></tr>";
				$counter++;
				}
				?>
		</table>
</div> <!-- End of "anwesende Spieler" -->


</div>
<div  id="spiel_hinzufuegen"><input type="submit" value="Senden" ></div>
</form> <!-- End of form "spiele" -->
<?php include('../footer.php');
?>