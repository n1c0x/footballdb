<?php 	include('../header.php'); ?>

<div id="div_spiele_hinzufuegen">
	<h2>Spiel hinzuf&uuml;gen</h2><br /><br />
	<table id="table_spiele_hinzufuegen">
		<tr>
			<td><b>Spielbeginn</td>
			<td><b>Spielort</td>
			<td><b>Treffzeit</td>
			<td><b>Treffort</td>
			<td><b>Heimmannschaft</td>
			<td><b>Gastmannschaft</td>
			<td><b>Spielart</td>
		</tr>
		
		<tr><form name="spiele" method="POST" action=" formular_spiele.php" enctype="multipart/form-data">
			<td>
				<table id="inner_table">
					<tr>
						<td><select name="spielbeginn_stunde"><?php for($i=0;$i<=23;$i++){
								if ($i == $_POST['spielbeginn_stunde']){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?></select></td>
						<td>:</td>
						<td><select name="spielbeginn_minute"><?php for($i=0;$i<=23;$i++){
								if ($i == $_POST['spielbeginn_minute']){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?></select></td>
					</tr>
				</table>

			<td><input type="text" name ="spielort" value="<?php echo $_POST['spielort']?>"/></td>
			<td>	
				<table id="inner_table">
					<tr>
						<td><select name="treffzeit_stunde">
							<?php for($i=0;$i<=23;$i++){
								if ($i == $_POST['treffzeit_stunde']){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?>
							</select>
						</td>
						<td>:</td>
						<td><select name="treffzeit_minute"><?php for($i=0;$i<=23;$i++){
								if ($i == $_POST['treffzeit_minute']){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?></select></td>
					</tr>
				</table>
			</td>
			<td><input type="text" name ="treffort" value="<?php echo $_POST['treffort']?>"/></td>
			<td><input type="text" name ="heim" value="<?php echo $_POST['heim']?>"/></td>
			<td><input type="text" name ="gast" value="<?php echo $_POST['gast']?>"/></td>
			<td>
				<?php
					$sql = "SELECT * FROM spielart";
					$result = mysql_query($sql);
				?>	
				<select name="spielart">
					<?php
							
					while($row = mysql_fetch_array($result))
						{
						if ($row['0'] == $_POST['spielart']){
							echo "<option value=".$row['0']." selected='selected'>".$row['1']."</option>";
						}
						else{
						echo "<option value=".$row['0'].">".$row['1']."</option>";
						}				
					}
					?>
				</select>
			</td>
		</tr>	
	</table> <!-- End of "table_spiele_hinzufuegen" -->
	<br />
	<div id="datum">

	<label><b>Datum:</b></label>	
		<select name="Tag">
			<?php

			for($i=1;$i<=31;$i++){
				if ($i == $_POST['Tag']){
					echo "<option value=".$i." selected ='selected'>".$i."</option>";
				}
				else{
					echo "<option value=".$i.">".$i."</option>";
				}
			}?>
		</select>
		<?php
			$sql = "SELECT monat.Monat FROM monat";
			$result = mysql_query($sql);
		?>
		<select name="Monat">
			<?php
			$counter = 1;
			while($row = mysql_fetch_array($result)){
				if ($counter == $_POST['Monat']) {
						echo "<option value=".$counter." selected='selected'>".$row['Monat']."</option>";
					}
					else{
						echo "<option value=".$counter.">".$row['Monat']."</option>";
					}
					$counter++;
				}?>
		</select>
		<select name="jahr">
			<?php
				for($i=date('Y');$i<=date('Y')+10;$i++){
					if ($i == $_POST['jahr']){
						echo "<option value=".$i." selected ='selected'>".$_POST['jahr']."</option>";
					}
					else{
						echo "<option value=".$i.">".$i."</option>";
					}
			}?>				
		</select>
	</div> <!-- End of "datum" -->
	<br />
<p><b>Anmerkungen:</b></p>
<textarea name="anmerkungen"><?php echo $_POST['anmerkungen']?></textarea>

<input type="submit" value="Senden" id="spiel_hinzufuegen" />
			</form>

</div> <!-- End of "div_spiele_hinzufuegen" -->

<?php include('../footer.php'); ?>