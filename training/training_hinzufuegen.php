<?php include("../connect.php");?>

<div id="field_global_training">
	<h1>Neues Training</h1>
			
	<div id="field_left_training">
		<form name="phase" action="training_hinzufuegen.php" method="get">
			<select name="phase" class="training_grupp">
				<?php 
				$sql = "SELECT * FROM gruppierung";
				$result = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result)){
					if($_GET['phase']==$row['ID']){
					echo "<option value=".$row['ID']." selected='selected'>".$row['name']."</option>";}
					else{
						echo "<option value=".$row['ID'].">".$row['name']."</option>";}
				}?>
			</select><br>

			<select name="art" class="training_grupp">
				<option value="0"></option>
				<?php 
				$sql = "SELECT * FROM uebungsart";
				$result = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result)){
					if($_GET['art']==$row['ID']){
					echo "<option value=".$row['ID']." selected='selected'>".$row['art']."</option>";}
					else{
						echo "<option value=".$row['ID'].">".$row['art']."</option>";}
				}?>
			</select><br>
			<input class="bearbeiten_button" type="submit" value="Suchen">
		</form>
	</div> <!-- End of field_left_training -->

	<div id="field_right_training">
		<form name="training" action="training_formular.php" method="post">
			<div id="training_datum">Datum des Trainings:<br />
				<select name="Tag">
					<?php 
					for($i=1;$i<=31;$i++){
					echo "<option value=".$i.">".$i."</option>";}
					?>
				</select>
				<select name="Monat">
					<?php
					$sql = "SELECT monat.ID,monat.Monat FROM monat";
					$result = mysqli_query($con,$sql);
							
					while($row = mysqli_fetch_array($result)){
						echo "<option value=".$row['ID'].">".$row['Monat']."</option>";
					}?>
				</select>
				<select name="Jahr">
					<?php 
					for($i=date('Y');$i<=date('Y')+10;$i++){
						echo "<option value=".$i.">".$i."</option>";}
					?>
				</select>
			</div> <!-- End of training_datum -->

			<div id="p_training_uebungen">&Uuml;bungen:<br />
				<select name="uebungen[]" size="10" multiple id="training_uebungen">
					<?php 
					$sql = '';
					echo "<pre>";
					print_r($_GET);
					echo "</pre>";
					$phase;
					$art;
					if(isset($_GET['phase'])){$phase = $_GET['phase'];}else{$phase='';}
					if(isset($_GET['art'])){$art = $_GET['art'];}else{$art='';}
					if($art=='' && $phase ==''){
						$sql='';
					}
					elseif($art=='0'){
						$sql = "SELECT uebungen.id,uebungen.titel FROM uebungen WHERE uebungen.gruppierung = ".$phase;
					}
					else{
						$art = $_GET['art'];
						$sql = "SELECT uebungen.id,uebungen.titel FROM uebungen WHERE uebungen.gruppierung = ".$phase." AND uebungen.uebungsart = ".$art;
					}
					if($sql!=''){
					$result = mysqli_query($con,$sql);

					while($row = mysqli_fetch_array($result)){
						echo "<option value=".$row['id'].">".$row['titel']."</option>";
					}
					}?>
				</select><br>
				<span id="infos">Mit Strg-Taste mehrere &Uuml;bungen ausw&auml;hlen</span>
			</div> <!-- End of p_training_uebungen -->
			<input type="submit" name="submit" value="Training erstellen" class="bearbeiten_button"/>
		</form>
	</div> <!-- field_left_training -->
</div> <!-- End of #field_global_training -->
