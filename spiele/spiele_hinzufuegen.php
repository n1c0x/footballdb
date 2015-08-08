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
						<td><select name="spielbeginn_stunde"><?php for($i=0;$i<=23;$i++){echo "<option value=".$i.">".$i."</option>";}?></select></td>
						<td>:</td>
						<td><select name="spielbeginn_minute"><?php for($i=0;$i<=59;$i++){echo "<option value=".$i.">".$i."</option>";}?></select></td>
					</tr>
				</table>

			<td><input type="text" name ="spielort" /></td>
			<td>	
				<table id="inner_table">
					<tr>
						<td><select name="treffzeit_stunde"><?php for($i=0;$i<=23;$i++){echo "<option value=".$i.">".$i."</option>";}?></select></td>
						<td>:</td>
						<td><select name="treffzeit_minute"><?php for($i=0;$i<=59;$i++){echo "<option value=".$i.">".$i."</option>";}?></select></td>
					</tr>
				</table>
			</td>
			<td><input type="text" name ="treffort" /></td>
			<td><input type="text" name ="heim" /></td>
			<td><input type="text" name ="gast" /></td>
			<td>
				<?php
					$sql = "SELECT spielart.name FROM spielart";
					$result = mysql_query($sql);
				?>	
				<select name="spielart">
					<?php
					$counter = 1;			
					while($row = mysql_fetch_array($result)){
						echo "<option value=".$counter.">".$row['name']."</option>";
						$counter++;
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
			<?php for($i=1;$i<=31;$i++){echo "<option value=".$i.">".$i."</option>";} ?>
		</select>
		<?php
			$sql = "SELECT monat.Monat FROM monat";
			$result = mysql_query($sql);
		?>
		<select name="Monat">
			<?php
			$counter = 1;
			while($row = mysql_fetch_array($result)){
				echo "<option value=".$counter.">".$row['Monat']."</option>";
				$counter++;
				}?>
		</select>
		<select name="jahr">
			<?php 
				for($i=date('Y');$i<=date('Y')+10;$i++){echo "<option value=".$i.">".$i."</option>";}?>					
		</select>
	</div> <!-- End of "datum" -->
	<br />
<p style="width:100px;margin:20px auto;"><b>Anmerkungen:</b></p>
<textarea name="anmerkungen"></textarea>
</div> <!-- End of "div_spiele_hinzufuegen" -->

	<div id="spiel_hinzufuegen"><input class="bearbeiten_button" type="submit" value="Senden"  /></div>
</form>
</article>


<?php include('../footer.php'); ?>