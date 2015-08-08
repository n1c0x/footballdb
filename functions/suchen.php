<?php

/* ************************************* */
/* ************************************* */
/* ************************************* */
## # # ## ########  ##     ## ##    ##  ######   ######## ##    ## 
##     ## ##     ## ##     ## ###   ## ##    ##  ##       ###   ## 
##     ## ##     ## ##     ## ####  ## ##        ##       ####  ## 
##     ## ########  ##     ## ## ## ## ##   #### ######   ## ## ## 
##     ## ##     ## ##     ## ##  #### ##    ##  ##       ##  #### 
##     ## ##     ## ##     ## ##   ### ##    ##  ##       ##   ### 
 #######  ########   #######  ##    ##  ######   ######## ##    ##
/* ************************************* */
/* ************************************* */
/* ************************************* */


if ($_GET['art'] == "uebungen") 
{
	?>
		<div class="row-fluid">
				<div class="span12">
					<h2 class="span6 text-center offset2">&Uuml;bung suchen</h2>
				</div> <!-- End of span12 -->
			</div> <!-- End of row-fluid -->

		<form class="form-horizontal span6 offset3" name="form" method="POST" action="index.php?page=3&art=uebungen&status=formular&status=suchen">
			<div class="control-group">
				<label class="control-label">Titel:</label>
				<div class="controls">
					<input type="text" name="titel"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Gruppierung:</label>
				<div class="controls">
					<select name="gruppierung">
						<option></option>
						<?php
							$sql = "SELECT gruppierung.name FROM gruppierung";
							$result = mysqli_query($con,$sql);

							$counter = 1;			
							while($row = mysqli_fetch_array($result))
							{
								echo "<option value=".$counter.">".$row[0]."</option>";
								$counter++;
							}
							?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Uebungsart:</label>
				<div class="controls">
					<select name="uebungsart">
						<option></option>
						<optgroup label="Attribut">
							<option value="1"> Kraft </option>
							<option value="2"> Schnelligkeit </option>
							<option value="3"> Ausdauer </option>

			      		</optgroup>

			     		<optgroup label="Koordination">
			     			<option value="4"> Koordination </option>

			      		</optgroup>

			     	 	<optgroup label="Athletik">					
			     	 		<option value="5"> Athletik </option>

			      		</optgroup>

			      		<optgroup label="Taktik">
							<option value="6"> IT </option>
							<option value="7"> GT-Offensiv </option>
							<option value="8"> GT-Defensiv </option>
							<option value="9"> MT-Offensiv </option>
							<option value="10"> MT-Defensiv </option>
			      		</optgroup>

			      		<optgroup label="Technik">
			      			<option value="11"> Passspiel </option>
							<option value="12"> Kopfball </option>
							<option value="13"> Torschu&szlig; </option>
							<option value="14"> Spielformen </option>
							<option value="15"> Finten </option>
							<option value="16"> Balltechnik </option>
			      		</optgroup>
			    	</select>
			    </div>
			</div>
			<div class="control-group">
				<label class="control-label">Freitextsuche:</label>
				<div class="controls">
					<input type="text" name="freitext">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-primary" type="submit">Suchen</button>
				</div>
			</div>
				
		</form>

	<?php
	
	

	if ($_GET['status'] == "suchen")
	{
		if (isset ($_POST['titel']))
			{
				$titel = $_POST['titel'];
										
				if ($titel != null && $titel != '') 
				{
					$where = " WHERE uebungen.titel LIKE '%".$titel."%'";
				}
				if ($_POST['gruppierung'] != null && $_POST['gruppierung'] != ''){
					if (!isset($where)){
						$where = " WHERE uebungen.gruppierung LIKE '%$_POST[gruppierung]%'";
					}
					else{
						$where .= " AND uebungen.gruppierung LIKE '%$_POST[gruppierung]%'";
					}
				}
				if ($_POST['uebungsart'] != null && $_POST['uebungsart'] != ''){
					if (!isset($where)){
						$where = " WHERE uebungen.uebungsart LIKE '%$_POST[uebungsart]%'";

					}
					else{
						$where .= " AND uebungen.uebungsart LIKE '%$_POST[uebungsart]%'";
					}
				}
				if ($_POST['freitext'] != null && $_POST['freitext'] != ''){
					if (!isset($where)){
						$where = " WHERE uebungen.titel LIKE '%$_POST[freitext]%' 
									OR uebungen.organisation LIKE '%$_POST[freitext]%' 
									OR uebungen.durchfuehrung LIKE '%$_POST[freitext]%' 
									OR uebungen.hinweise LIKE '%$_POST[freitext]%' ";

					}
					else{
						$where .= " AND uebungen.titel LIKE '%$_POST[freitext]%' 
									OR uebungen.organisation LIKE '%$_POST[freitext]%' 
									OR uebungen.durchfuehrung LIKE '%$_POST[freitext]%' 
									OR uebungen.hinweise LIKE '%$_POST[freitext]%' ";
					}
				}
			}

			$sql = "SELECT * FROM uebungen 
						LEFT JOIN gruppierung 
						ON uebungen.gruppierung = gruppierung.ID
						LEFT JOIN uebungsart
						ON uebungen.uebungsart = uebungsart.ID";

			if (isset($where)){
				$sql .= $where;
			}
			
			$result2 = mysqli_query($con,$sql);
		?>
	<div class="row-fluid">
		<div class="span5 offset3">

			<table class="table">

				<?php
				$i = 0;
				while($row = mysqli_fetch_array($result2))
				{
					$target_path = "upload/". $row[0]. ".jpg";
					$filename = "$target_path";
					?>
			<tr>
				<td><a href='functions/anzeigen.php?art=uebungen&id=<?php echo $row[0]?>' target='_blank'>
					<strong><?php echo $row[1]?></strong></a>
					<table class="table ">	
						<tr>
							<td class="td-width-small"><u>Phase:</u></td>
							<td><?php echo $row[11]?></td>
						</tr>
						<tr><td class="td-width-small"><u>&Uuml;bungsart:</u></td>
							<td><?php echo $row[13]?></td>
						</tr>
					</table>
				</td>

				<td>
					<?php
					if(file_exists($filename)){
					?>				
							<a href='functions/anzeigen.php?art=uebungen&id=<?php echo $row[0]?>' target='_blank'>
								<img class="bild bild-small" src="upload/<?php echo $row[0]?>.jpg" >
							</a>
					<?php
					}
					else{
					?>
						<a href='functions/anzeigen.php?art=uebungen&id=<?php echo $row[0]?>' target='_blank'>
							<img class="bild bild-small" src="upload/default_uebung.jpeg"/>
						</a>
				</td>
					<?php } ?>
						<td width="25px" id="top-margin-buttons">
							<a href='/functions/aendern.php?id=<?php echo $row[0]?>&art=uebungen' class="no_underline" target='_blank'>
								<img src='img/alter.png' width="30px" height="30px">
							</a>
							<a href = '/functions/delete.php?id=<?php echo $row[0]?>&art=uebungen' class="no_underline" onclick="if (!confirm('Wollen Sie wirklich den Eintrag l&ouml;schen?')) {return false;} "; target='_blank'>
								<img src="img/delete.png" width="30px" height="30px">
							</a>
						</td>	
			</tr>

				<?php
					$i++;
				}?>
			</table>

		</div> <!-- End of span5 offset3 -->
	</div> <!-- End of row-fluid -->
<?php

	}
//echo '</table></div>';
}

/* ************************************* */
/* ************************************* */
/* ************************************* */
 ######  ########  #### ######## ##       ######## ########  
##    ## ##     ##  ##  ##       ##       ##       ##     ## 
##       ##     ##  ##  ##       ##       ##       ##     ## 
 ######  ########   ##  ######   ##       ######   ########  
      ## ##         ##  ##       ##       ##       ##   ##   
##    ## ##         ##  ##       ##       ##       ##    ##  
 ######  ##        #### ######## ######## ######## ##     ##
/* ************************************* */
/* ************************************* */
/* ************************************* */

elseif($_GET['art'] == "spieler")
{
	?>
	<div class="container">
			<h2 class="offset4">Spieler suchen</h2>


		<form class="form-horizontal offset2" name="form" method="POST" action="index.php?page=3&art=spieler&status=formular&status=suchen">
			<div class="control-group">
				<label class="control-label">Name:</label>
				<div class="controls">
					<input type="text" name="name"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Vorname:</label>
				<div class="controls">
					<input type="text" name="vorname"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Adresse:</label>
				<div class="controls">
					<input type="text" name="adresse"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Wohnort:</label>
				<div class="controls">
					<input type="text" name="stadt"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Position:</label>
				<div class="controls">
						<?php
							$sql = "SELECT position.name FROM position";
							$result = mysqli_query($con,$sql);
							echo '<select name="id_position">';
							echo '<option value="0"></option>';
							$counter = 1;			
							while($row = mysqli_fetch_array($result)){
								echo "<option value=".$counter.">".$row[0]."</option>";
								$counter++;
							}?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-primary" type="submit">Suchen</button>
				</div>
			</div>
	</form>
</div>

	<?php
	if (isset ($_POST['name']))
	{

		/*$name = $_POST['name'];*/

		if ($_POST['name'] != null && $_POST['name'] != '') 
		{
			$where = " WHERE spieler.name LIKE '%$_POST[name]%'";
		}
		if ($_POST['vorname'] != null && $_POST['vorname'] != '')
		{
			if (!isset($where))
			{
				$where = " WHERE spieler.vorname LIKE '%$_POST[vorname]%'";
			}
			else
			{
				$where .= " AND spieler.vorname LIKE '%$_POST[vorname]%'";
			}
		}
		if ($_POST['id_position'] != null && $_POST['id_position'] != '')
		{
			if (!isset($where)) 
			{
				$where = " WHERE spieler.id_position LIKE '$_POST[id_position]'";
			}
			else
			{
				$where .= " AND spieler.id_position LIKE '$_POST[id_position]'";
			}
		}
		if ($_POST['adresse'] != null && $_POST['adresse'] != '')
		{
			if (!isset($where)) 
			{
				$where = " WHERE spieler.strasse LIKE '%$_POST[adresse]%' OR spieler.hausnummer LIKE'%$_POST[adresse]%'";

			}
			else
			{
				$where .= " AND spieler.strasse LIKE '%$_POST[adresse]%' OR spieler.hausnummer LIKE'%$_POST[adresse]%'";
			}
		}
		if ($_POST['stadt'] != null && $_POST['stadt'] != '')
		{
			if (!isset($where)) 
			{
				$where = " WHERE spieler.stadt LIKE '%$_POST[stadt]%'";

			}
			else
			{
				$where .= " AND spieler.stadt LIKE '%$_POST[stadt]%'";
			}
		}
	}

	$sql = "SELECT * FROM spieler 
							LEFT JOIN position 
							ON spieler.id_position = position.id";

	if (isset($where))
	{
		$sql .= $where;
	}

	$result2 = mysqli_query($con,$sql);

	?>
<div class="span12">
	
	<?php
	if ($_GET['status'] == "suchen"){
		while($row = mysqli_fetch_array($result2)){
			$target_path = 'upload/spieler/'. $row[0]. '.jpg';
			$filename = $target_path;
			?>
			<div class="rounded-border player">
				<table>
					<tr><td><u>Name:</u></td> <td><?php echo $row[2]." ".$row[1];?></td><tr>
					<tr><td><u>Adresse:</u> </td> <td><?php echo $row[3]." ".$row[4];?><br /><?php echo $row[5]." ".$row[6];?></td><tr>
					<tr><td><u>Festnetz:</u> </td> <td><?php echo $row[7]." / ".$row[8];?></td><tr>
					<tr><td><u>Handy:</u> </td> <td><?php echo $row[9]." / ".$row[10];?></td><tr>
					<tr><td><u>Pass-Nummer:</u> </td> <td><?php echo $row[11];?></td><tr>
					<tr><td><u>Position:</u></td> <td><?php echo $row[16];?></td><tr>
					<tr><td><u>St&auml;rken:</u></td> <td><?php echo $row[13];?></td><tr>
					<tr><td><u>Schw&auml;chen:</u></td> <td><?php echo $row[14];?></td>
				</table>
				<?php
				
				if(file_exists($filename)){ ?>
					<br><img src="<?php echo $filename?>" class="bild_spieler img-polaroid"/><br><br>
				<?php } else{ ?>
					<br><img src="upload/spieler/default_spieler.jpeg" class="bild_spieler img-polaroid"/><br><br>
				<?php } ?>

				<a href = 'functions/aendern.php?id=<?php echo $row[0]?>&art=spieler'>
					<img src='img/alter.png' width="30px" height="30px" /><a>
				<a href = 'loesche.php?id=<?php echo $row[0]?>&art=spieler' onclick="if (!confirm('Wollen Sie wirklich den Eintrag löschen?')) {return false;} ";} >
					<img src='img/delete.png' width="30px" height="30px" /></a>
				
			</div>
		<?php }
	}?>

</div>


<?php
}

/* ************************************* */
/* ************************************* */
/* ************************************* */
######## ########     ###    #### ##    ## #### ##    ##  ######   
   ##    ##     ##   ## ##    ##  ###   ##  ##  ###   ## ##    ##  
   ##    ##     ##  ##   ##   ##  ####  ##  ##  ####  ## ##        
   ##    ########  ##     ##  ##  ## ## ##  ##  ## ## ## ##   #### 
   ##    ##   ##   #########  ##  ##  ####  ##  ##  #### ##    ##  
   ##    ##    ##  ##     ##  ##  ##   ###  ##  ##   ### ##    ##  
   ##    ##     ## ##     ## #### ##    ## #### ##    ##  ###### 
/* ************************************* */
/* ************************************* */
/* ************************************* */


elseif($_GET['art'] == "training")
{
?>
	<div class="container">
			<h2 class="offset4">Training suchen</h2>


		<form class="form-horizontal offset2" name="form" method="POST" action="index.php?page=3&art=training&status=formular&status=suchen">
			<div class="control-group">
				<label class="control-label">Datum:</label>
				<div class="controls">
					<select name="monat">
						<option value="0"> - </option>
						<option value="13">Alle Monate durchsuchen</option>
						<optgroup>-----</optgroup>
					<?php
					$sql = "SELECT monat.Monat FROM monat";
						$result = mysqli_query($con,$sql);

						$counter = 1;			
						while($row = mysqli_fetch_array($result))
						{
							echo "<option value=".$counter.">".$row['Monat']."</option>";
							$counter++;
						}
					?>
						
					</select>	
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<select name="jahr">
					<?php
						for($i=date('Y')-1;$i<=date('Y')+1;$i++){
							if($i==date('Y')){
							echo "<option selected='selected' value=".$i.">".$i."</option>";}
							else{
								echo "<option value=".$i.">".$i."</option>";}
						}
					?>
					</select>	
				</div>
			</div>


			<div class="control-group">
				<label class="control-label">Nach Spieler:</label>
				<div class="controls">
					<input type="text" name="spieler"/>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Nach &Uuml;bung:</label>
				<div class="controls">
					<input type="text" name="uebung"/>	
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button class="btn btn-primary" type="submit">Suchen</button>
				</div>
			</div>
	</form>


<?php

if(isset($_POST['spieler']) OR isset($_POST['spieler']) OR isset($_POST['monat']) OR isset($_POST['jahr'])){
	$spieler = htmlentities($_POST['spieler']);
	$uebung = htmlentities($_POST['uebung']);
	$monat = htmlentities($_POST['monat']);
	$jahr = htmlentities($_POST['jahr']);

	// Initalisierung der Spieler Variabeln
	$query_spieler = null;			// SQL Query zum abfragen der Datenbank
	$row_spieler = null;			// Ergebnis von $query_spieler
	$count_spieler_training = null;	// Anzahl von Trainings für ein bestimmten Spieler
	$row_spieler_training = null;	// Datum der Trainings

	// Initalisierung der Übung Variabeln
	$query_uebung = null;			// SQL Query zum abfragen der Datenbank
	$row_uebung = null;				// Ergebnis von $query_uebung
	$count_uebung_training = null;	// Anzahl von Trainings für eine bestimmte Übung
	$row_uebung_training = null;	// Datum der Trainings

	// Initalisierung der Datum Variabeln
	$query_monat = null;			// SQL Query zum abfragen der Datenbank
	$row_monat = null;				// Ergebnis von $query_monat
	$count_monat_training = null;	// Anzahl von Trainings für ein bestimmten Monat

	


	if($spieler != ""){
		$query_spieler = mysqli_query($con, "SELECT spieler.SID AS id, spieler.name AS nachname, spieler.vorname AS vorname 
												FROM spieler 
												WHERE spieler.name LIKE '%".$spieler."%' 
												OR spieler.vorname LIKE '%".$spieler."%'");

		while ($row_spieler=mysqli_fetch_array($query_spieler)) {
			$count_spieler_training = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM id_training_id_spieler 
															INNER JOIN training ON id_training_id_spieler.id_training=training.id 
															WHERE id_spieler=".$row_spieler['id']));

			echo '<h3 class="offset3">'.$row_spieler['vorname'].' '.$row_spieler['nachname'].': '.$count_spieler_training[0].' Training(s)</h3>';

			$query_spieler_training = mysqli_query($con, "SELECT id_training_id_spieler.id_training, training.datum, training.id FROM id_training_id_spieler 
															INNER JOIN training ON id_training_id_spieler.id_training=training.id 
															WHERE id_spieler=".$row_spieler['id']);
			while($row_spieler_training = mysqli_fetch_array($query_spieler_training)){
				
				$query_anzeige_uebung = mysqli_query($con,"SELECT 
												id_training_id_uebungen.id_training AS id_tr,
												id_training_id_uebungen.id_uebungen AS id_ue,
												uebungen.titel AS titel,
												uebungen.dauer AS dauer,
												uebungen.ID
											FROM id_training_id_uebungen 
											INNER JOIN uebungen
											ON id_training_id_uebungen.id_uebungen=uebungen.ID
											WHERE id_training=".$row_spieler_training['id']);

				$query_anzeige_spieler = mysqli_query($con,"SELECT 
												id_training_id_spieler.id_training AS id_tr,
												id_training_id_spieler.id_spieler AS id_sp,
												spieler.name AS nachname,
												spieler.vorname AS vorname,
												spieler.SID AS id
											FROM id_training_id_spieler 
											INNER JOIN spieler
											ON id_training_id_spieler.id_spieler=spieler.SID
											WHERE id_training=".$row_spieler_training['id']);?>

				<div class="row">
					<div class="span10 offset1 rounded-border training-container">
						<h3 class="offset4">Training vom <?php echo date("d/m/Y",$row_spieler_training['datum'])?> </h3>
						<div class="span5 offset1">

							<h4>&Uuml;bungen:</h4>
							<dl>
								<?php 
									while($row_anzeige_uebung = mysqli_fetch_array($query_anzeige_uebung)){?>
										<dt><a href="/functions/anzeigen.php?art=uebungen&id=<?php echo $row_uebungen['ID'];?>" target=_blank><?php echo $row_anzeige_uebung['titel']; ?></a></dt>
										<?php
										echo "<dd><i class='icon-time'></i> ".$row_anzeige_uebung['dauer']." Minute(n)</dd>";
									}

								?>
							</dl>
						</div>
						<div class="span3">
							<h4>Spieler:</h4>
							<ul class="unstyled">
								<?php 
									while($row_anzeige_spieler = mysqli_fetch_array($query_anzeige_spieler)){
										if($row_anzeige_spieler['id_sp'] == $row_spieler['id']){
											echo '<li><i class="icon-user"></i> <span class="success">'.$row_anzeige_spieler['vorname'].' '.$row_anzeige_spieler['nachname'].'</span></li>';
										}
										else{
											echo '<li><i class="icon-user"></i> <span>'.$row_anzeige_spieler['vorname'].' '.$row_anzeige_spieler['nachname'].'</span></li>';
										}
									}

								?>
							</ul>
						</div>
					</div>
				</div><br>
			<?php
			}
		}
	}
	elseif($uebung != ""){
		
		$query_uebung = mysqli_query($con, "SELECT uebungen.id AS id, uebungen.titel AS titel, uebungen.dauer AS dauer FROM uebungen WHERE uebungen.titel LIKE '%".$uebung."%'");

		while ($row_uebung = mysqli_fetch_array($query_uebung)) {
			$count_uebung_training = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM id_training_id_uebungen 
															INNER JOIN training ON id_training_id_uebungen.id_training=training.id 
															WHERE id_uebungen=".$row_uebung['id']));

			echo '<h3 class="offset3">'.$row_uebung['titel'].': '.$count_uebung_training[0].' Training(s)</h3>';

			$query_uebung_training = mysqli_query($con, "SELECT id_training_id_uebungen.id_training, training.datum, training.id FROM id_training_id_uebungen 
															INNER JOIN training ON id_training_id_uebungen.id_training=training.id 
															WHERE id_uebungen=".$row_uebung['id']);
			while($row_uebung_training = mysqli_fetch_array($query_uebung_training)){

				$query_anzeige_uebung = mysqli_query($con,"SELECT 
												id_training_id_uebungen.id_training AS id_tr,
												id_training_id_uebungen.id_uebungen AS id_ue,
												uebungen.titel AS titel,
												uebungen.dauer AS dauer,
												uebungen.ID
											FROM id_training_id_uebungen 
											INNER JOIN uebungen
											ON id_training_id_uebungen.id_uebungen=uebungen.ID
											WHERE id_training=".$row_uebung_training['id']);

				$query_anzeige_spieler = mysqli_query($con,"SELECT 
												id_training_id_spieler.id_training AS id_tr,
												id_training_id_spieler.id_spieler AS id_sp,
												spieler.name AS nachname,
												spieler.vorname AS vorname,
												spieler.SID AS id
											FROM id_training_id_spieler 
											INNER JOIN spieler
											ON id_training_id_spieler.id_spieler=spieler.SID
											WHERE id_training=".$row_uebung_training['id']);

				// echo "Trainingsdatum: ".date("d/m/Y",$row_uebung_training['datum'])."<br>";?>

				<div class="row">
					<div class="span10 offset1 rounded-border training-container">
						<h3 class="offset4">Training vom <?php echo date("d/m/Y",$row_uebung_training['datum'])?> </h3>
						<div class="span5 offset1">

							<h4>&Uuml;bungen:</h4>
							<dl>
								<?php 
									while($row_anzeige_uebung = mysqli_fetch_array($query_anzeige_uebung)){
										if($row_anzeige_uebung['id_ue'] == $row_uebung['id']){
											echo '<dt><span class="success"><a href="/functions/anzeigen.php?art=uebungen&id='.$row_anzeige_uebung['ID'].'" target=_blank class="white">'.$row_anzeige_uebung['titel'].'</a></span></dt>';
											echo "<dd><i class='icon-time'></i> ".$row_anzeige_uebung['dauer']." Minute(n)</dd>";
										}
										else{
											echo '<dt><span><a href="/functions/anzeigen.php?art=uebungen&id='.$row_anzeige_uebung['ID'].'" target=_blank>'.$row_anzeige_uebung['titel'].'</a></span></dt>';
											echo "<dd><i class='icon-time'></i> ".$row_anzeige_uebung['dauer']." Minute(n)</dd>";
										}
										
									}

								?>
							</dl>
						</div>
						<div class="span3">
							<h4>Spieler:</h4>
							<ul class="unstyled">
								<?php 
									while($row_anzeige_spieler = mysqli_fetch_array($query_anzeige_spieler)){
										echo '<li><i class="icon-user"></i> '.$row_anzeige_spieler['vorname'].' '.$row_anzeige_spieler['nachname'].'</li>';
									}

								?>
							</ul>
						</div>
					</div>
				</div><br>
			<?php
			}
		}
	}
	elseif($monat != 0 && $monat != 13){

		$query_monat = mysqli_query($con, "SELECT monat.ID, monat.Monat FROM monat WHERE ID=".$monat);
		$monat = "";


		while ($row_monat=mysqli_fetch_array($query_monat)) {
			$count_monat_training = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM training 
																			WHERE FROM_UNIXTIME(training.datum,'%c %Y')='".$row_monat[0]." ".$jahr."'"));
			
			echo '<h3 class="offset3">'. $row_monat[1].' '.$jahr.': '.$count_monat_training[0].' Training(s)</h3>';
			$monat = $row_monat[0];
		}

		$query_monat_training = mysqli_query($con, "SELECT training.id, training.datum 
														FROM training 
														WHERE FROM_UNIXTIME(training.datum,'%c %Y')='".$monat." ".$jahr."' 
														ORDER BY training.datum ASC");

		while($row_monat_training = mysqli_fetch_array($query_monat_training)){

		/*echo "<pre>";
		print_r($row_monat_training);
		echo "</pre>";*/

			$query_anzeige_uebung = mysqli_query($con,"SELECT 
											id_training_id_uebungen.id_training AS id_tr,
											id_training_id_uebungen.id_uebungen AS id_ue,
											uebungen.titel AS titel,
											uebungen.dauer AS dauer,
											uebungen.ID AS id
										FROM id_training_id_uebungen 
										INNER JOIN uebungen
										ON id_training_id_uebungen.id_uebungen=uebungen.ID
										WHERE id_training=".$row_monat_training['id']);

			$query_anzeige_spieler = mysqli_query($con,"SELECT 
											id_training_id_spieler.id_training AS id_tr,
											id_training_id_spieler.id_spieler AS id_sp,
											spieler.name AS nachname,
											spieler.vorname AS vorname,
											spieler.SID AS id
										FROM id_training_id_spieler 
										INNER JOIN spieler
										ON id_training_id_spieler.id_spieler=spieler.SID
										WHERE id_training=".$row_monat_training['id']);?>

			<div class="row">
				<div class="span10 offset1 rounded-border training-container">
					<h3 class="offset4"><span class="success">Training vom <?php echo date("d/m/Y",$row_monat_training['datum'])?></span> </h3>
					<div class="span5 offset1">

						<h4>&Uuml;bungen:</h4>
						<dl>
							<?php 
								while($row_anzeige_uebung = mysqli_fetch_array($query_anzeige_uebung)){
										echo '<dt><span><a href="/functions/anzeigen.php?art=uebungen&id='.$row_anzeige_uebung['id'].'" target=_blank>'.$row_anzeige_uebung['titel'].'</a></span></dt>';
										echo "<dd><i class='icon-time'></i> ".$row_anzeige_uebung['dauer']." Minute(n)</dd>";									
								}

							?>
						</dl>
					</div>
					<div class="span3">
						<h4>Spieler:</h4>
						<ul class="unstyled">
							<?php 
								while($row_anzeige_spieler = mysqli_fetch_array($query_anzeige_spieler)){
									echo '<li><i class="icon-user"></i> '.$row_anzeige_spieler['vorname'].' '.$row_anzeige_spieler['nachname'].'</li>';
								}

							?>
						</ul>
					</div>
				</div>
			</div><br>
		<?php
		}
	}
elseif ($monat == 13) {
			$count_jahr_training = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM training 
																			WHERE FROM_UNIXTIME(training.datum,'%Y')='".$jahr."'"));

			echo '<h3 class="offset3">Jahr '. $jahr.': '.$count_jahr_training[0].' Training(s)</h3>';

			$query_jahr_training = mysqli_query($con, "SELECT training.id, training.datum 
														FROM training 
														WHERE FROM_UNIXTIME(training.datum,'%Y')='".$jahr."' 
														ORDER BY training.datum ASC");

			while($row_jahr_training = mysqli_fetch_array($query_jahr_training)){

			/*echo "<pre>";
			print_r($row_monat_training);
			echo "</pre>";*/

			$query_anzeige_uebung = mysqli_query($con,"SELECT 
											id_training_id_uebungen.id_training AS id_tr,
											id_training_id_uebungen.id_uebungen AS id_ue,
											uebungen.titel AS titel,
											uebungen.dauer AS dauer,
											uebungen.ID AS id
										FROM id_training_id_uebungen 
										INNER JOIN uebungen
										ON id_training_id_uebungen.id_uebungen=uebungen.ID
										WHERE id_training=".$row_jahr_training['id']);

			$query_anzeige_spieler = mysqli_query($con,"SELECT 
											id_training_id_spieler.id_training AS id_tr,
											id_training_id_spieler.id_spieler AS id_sp,
											spieler.name AS nachname,
											spieler.vorname AS vorname,
											spieler.SID AS id
										FROM id_training_id_spieler 
										INNER JOIN spieler
										ON id_training_id_spieler.id_spieler=spieler.SID
										WHERE id_training=".$row_jahr_training['id']);?>

			<div class="row">
				<div class="span10 offset1 rounded-border training-container">
					<h3 class="offset4"><span class="success">Training vom <?php echo date("d/m/Y",$row_jahr_training['datum'])?></span> </h3>
					<div class="span5 offset1">
						<h4>&Uuml;bungen:</h4>
						<dl>
							<?php 
								while($row_anzeige_uebung = mysqli_fetch_array($query_anzeige_uebung)){
										echo '<dt><span><a href="/functions/anzeigen.php?art=uebungen&id='.$row_anzeige_uebung['id'].'" target=_blank>'.$row_anzeige_uebung['titel'].'</a></span></dt>';
										echo "<dd><i class='icon-time'></i> ".$row_anzeige_uebung['dauer']." Minute(n)</dd>";									
								}

							?>
						</dl>
					</div>
					<div class="span3">
						<h4>Spieler:</h4>
						<ul class="unstyled">
							<?php 
								while($row_anzeige_spieler = mysqli_fetch_array($query_anzeige_spieler)){
									echo '<li><i class="icon-user"></i> '.$row_anzeige_spieler['vorname'].' '.$row_anzeige_spieler['nachname'].'</li>';
								}

							?>
						</ul>
					</div>
				</div>
			</div><br>
		<?php
		}
	} } ?>
</div>
<?php } ?>