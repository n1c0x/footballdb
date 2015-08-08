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

$id = $_GET['id'];
if ($_GET['art'] == "uebungen") {

$sql = mysqli_query($con,"SELECT * FROM fussball_uebungen.uebungen 
										LEFT JOIN gruppierung 
										ON uebungen.gruppierung = gruppierung.id 	
										LEFT JOIN uebungsart
										ON uebungen.uebungsart = uebungsart.ID 
										LEFT JOIN laenge
										ON uebungen.dauer = laenge.id
										WHERE uebungen.id=".$id."");

$res = mysqli_fetch_array($sql) or die ("MySQL-Error: " . mysqli_error($con));
?>
<div>
	<?php
	$datum = $res['2'];
	$phase = $res['10'];
	$art = $res['12'];

	/*echo"<pre>";
	print_r($res);
	echo"</pre>";*/

	$id = substr("$_GET[id]",0,-4); 
		echo $id;?>
	<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 text-center offset2">&Uuml;bung &auml;ndern</h2>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

<form name="Uebungen" action="/functions/formular_update.php?art=uebungen&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

<div class="row-fluid">
	<div class="span6">
		<div class="control-group">
			<label class="control-label">Titel</label>
			<div class="controls">
				<input class="span10" type="text" name="titel" placeholder="Titel der &Uuml;bung" value="<?php echo $res['titel'] ?>"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Datum</label>
			<div class="controls controls-row">
				<input type="date" name="datum" value="<?php echo date("Y-m-d",$res['datum']) ?>">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Organisation</label>
			<div class="controls">
				<textarea name="organisation" rows="5" cols="10" placeholder="Organisation" class="span10"><?php echo $res['organisation'] ?></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Hinweise</label>
			<div class="controls">
				<textarea name="hinweise" rows="5" cols="10" placeholder="Hinweise" class="span10"><?php echo $res['hinweise'] ?></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->

	</div> <!-- end of span5 -->

	<div class="span6">
		<div class="control-group">
			<label class="control-label">Phase</label>
			<div class="controls">
				<select name="gruppierung">
				<?php
					$sql = "SELECT * FROM gruppierung";
					$result = mysqli_query($con,$sql);
					$counter = 1;			
					while($row = mysqli_fetch_array($result)){
						if($row[0] == $counter){
							echo "<option value=".$counter." selected='selected'>".$row[1]."</option>";
							$counter++;
						}
						else{
							echo "<option value=".$counter.">".$row[1]."</option>";
						}
					}?>
				</select>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Art der &Uuml;bung</label>
			<div class="controls">

				<select name="uebungsart">
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
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Durchf&uuml;hrung</label>
			<div class="controls">
				<textarea name="durchfuehrung" rows="5" cols="10" placeholder="Durchf&uuml;hrung" class="span10"><?php echo $res['durchfuehrung'] ?></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->

<output id="list"><img id="newImage" class="thumb img-rounded" src="upload/<?php echo $_GET['id'] ?>.jpg" style="height:130px" /></output>
	</div> <!-- end of span6 -->	

</div> <!-- end of row-fluid -->


<div class="row-fluid">		
	<div class="span6 offset3">
		<div class="control-group">
			<label class="control-label">Bild</label>
			<div class="controls">
					<input type="file" name="files[]" id="files" value="blah" style="border:none;width:120px"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->
				
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb img-rounded" src="', e.target.result,
                            '" title="', escape(theFile.name), '" style="height:130px"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
		<div class="control-group">
			<label class="control-label">Dauer der &Uuml;bung:</label>
			<div class="controls">
				<select name="laenge" class="input-small">
				<?php
					$sql_laenge = "SELECT * FROM laenge";
					$result_laenge = mysqli_query($con,$sql_laenge);
					$counter = 1;
					while($row_laenge = mysqli_fetch_array($result_laenge)){
						if($res['dauer'] == $row_laenge['id']){
							echo "<option value=".$counter." selected='selected'>".$row_laenge['laenge']."</option>";
						}
						else{
						echo "<option value=".$counter.">".$row_laenge['laenge']."</option>";}
						$counter++;
					}
				?>
				</select> Minuten
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Author</label>
			<div class="controls">
					<input type="text" name="author" value="Bernhard Walther" style="width:170px" value="<?php echo $res['author'] ?>"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<div class="controls">
				<button type="button" class="btn" onclick="window.location.href='?page=2&art=uebungen'">Zur&uuml;ck</button>
				<button type="submit" class="btn btn-primary"  onclick="if (!confirm('Wollen Sie wirklich den Eintrag hinzuf&uuml;gen?')) {return false;} ;">Speichern</button>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->
		
	</div> <!-- End of "span6 offset3" -->
</div> <!-- End of "row-fluid" -->
</form>

<?php
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

elseif ($_GET['art'] == "spieler") {
	?>
	

<div class="container">
	<h1 class="text-center">Spielerdaten &auml;ndern</h1>

<div class="row">
	<div class="span4">
	<?php
	$sql=mysqli_query($con,"SELECT * FROM spieler 
								LEFT JOIN position ON spieler.id_position = position.id 
								WHERE spieler.SID=$id");
	$res = mysqli_fetch_array($sql)
		or die ("MySQL-Error: " . mysql_error()); 

	$position = $res['12'];


		$target_path = "upload/spieler/".$_GET['id'].".jpg";
		$filename = "$target_path";

		if(file_exists($filename)){
			?>
			<img class="img-polaroid" src="/upload/spieler/<?php echo $_GET['id']?>.jpg" width="auto" height="auto" />
		<?php
		}
		else{?>
			<img class="img-polaroid" src="/upload/spieler/default_spieler.jpeg" width="auto" height="auto" />
			<?php
		}?>
		<form method="POST" action="/functions/formular_update.php?id=<?php echo $res[0] ?>&art=spieler" enctype="multipart/form-data" class="form-horizontal form-inline">
			<br>
		<div class="row-fluid">		
			<div class="span6 offset3">
				<div class="control-group">
					<label class="control-label">Neues Bild:</label>
					<output id="list"></output>
					<div class="controls">
							<input type="file" name="files[]" id="files" value="blah" style="border:none;width:120px"/>
					</div> <!-- End of controls -->
				</div> <!-- End of control-group -->
			</div>
		</div>
		<script>
		  function handleFileSelect(evt) {
		    var files = evt.target.files; // FileList object

		    // Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {

		      // Only process image files.
		      if (!f.type.match('image.*')) {
		        continue;
		      }

		      var reader = new FileReader();

		      // Closure to capture the file information.
		      reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          var span = document.createElement('span');
		          span.innerHTML = ['<img class="thumb img-rounded" src="', e.target.result,
		                            '" title="', escape(theFile.name), '" style="height:130px"/>'].join('');
		          document.getElementById('list').insertBefore(span, null);
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		  }

		document.getElementById('files').addEventListener('change', handleFileSelect, false);
		</script>

		<input class="btn btn-primary" type="submit" name="submit" value="Bearbeiten" />
		<input class="btn" type="button" name="zurück" value="Zur&uuml;ck" onclick="window.location.href='/index.php?page=2&art=spieler'" />
	</div> 
	<div class="span4">	

		<div class="control-group">
			<label class="control-label">Name:</label>
			<div class="controls">
				<input type="text" name="name" value="<?php echo $res[1] ?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Vorname:</label>
			<div class="controls">
				<input type="text" name="vorname" value="<?php echo $res[2] ?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Adresse:</label>
			<div class="controls">
				<input type="text" name="strasse" value="<?php echo $res[3] ?>" />
				<input type="text" name="hausnummer" class="input-mini" value="<?php echo $res[4] ?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Stadt:</label>
			<div class="controls">
				<input type="text" name="stadt" value="<?php echo $res[6] ?>" />
				<input type="text" name="PLZ" class="input-mini" value="<?php echo $res[5] ?>"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Festnetz:</label>
			<div class="controls">
				<input type="text" name="vorwahl_festnetz" class="input-mini" value="<?php echo $res[7] ?>"/>
				<span class="divider">/</span>
				<input type="text" name="telefon_nr" value="<?php echo $res[8] ?>"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Handy:</label>
			<div class="controls">
				<input type="text" name="vorwahl_handy" class="input-mini" value="<?php echo $res[9] ?>"/>
				<span class="divider">/</span>
				<input type="text" name="handy_nr" value="<?php echo $res[10] ?>" id="nummer_aendern" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Passnummer:</label>
			<div class="controls">
				<input type="text" name="pass_nr" value="<?php echo $res[11] ?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Position:</label>
			<div class="controls">
				<select name="id_position">
					<?php
						$sql = "SELECT * FROM position";
						$result = mysqli_query($con,$sql);
						$counter = 1;			
						while($row = mysqli_fetch_array($result)){
							if ($row['0'] == $position){
								echo "<option value=".$counter." selected='selected'>".$row['1']."</option>";
							}
							else{
								echo "<option value=".$counter.">".$row['1']."</option>";
							}				
							$counter++;
						}?>
				</select>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">St&auml;rken:</label>
			<div class="controls">
				<input type="text" name="staerken" value="<?php echo $res['13']?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Schw&auml;chen:</label>
			<div class="controls">
				<input type="text" name="schwaechen" value="<?php echo $res['14']?>" />
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->
	</div>
		</form>


</div>
<?php }


/* ************************************* */
/* ************************************* */
/* ************************************* */
 ######  ########  #### ######## ##       ######## 
##    ## ##     ##  ##  ##       ##       ##       
##       ##     ##  ##  ##       ##       ##       
 ######  ########   ##  ######   ##       ######   
      ## ##         ##  ##       ##       ##       
##    ## ##         ##  ##       ##       ##       
 ######  ##        #### ######## ######## ########
/* ************************************* */
/* ************************************* */
/* ************************************* */


 elseif ($_GET['art'] == "spiele") {
 	$sql = "SELECT * FROM spiele Where ID=".$_GET['id']."";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	{
	$spielbeginn_stunde = date('G',$row['2']);
	$spielbeginn_minute = date('i',$row['2']);
	$treffzeit_stunde = date('G',$row['4']);
	$treffzeit_minute = date('i',$row['4']);	
	$spielort= $row["3"];
	$treffpunkt= $row["5"];
	$heim= $row["6"];
	$gast= $row["7"];
	$anmerkung= $row["8"];
	$datum = $row['1'];
	$spielart=$row['9'];
	$tag = date('d',$datum);
	$monat = date('m',$datum);
	$jahr = date('Y',$datum);
	}
?>
<!-- <div class="container"> -->
<div class="row">
		<h2 class="span4 offset3 text-center">Spiel bearbeiten</h2>
</div> <!-- end of row -->

<form name="spiele" method="POST" action="/functions/formular_update.php?art=spiele&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data" class="form-horizontal">


<div class="row">
		<div class="span10 text-center"><h4>Datum</h4></div>
</div> <!-- end of row -->

<div class="row">
	<div class="span10 text-center margin-unten">
		<input type="date" name="datum" value="<?php echo date('Y-m-d',$datum); ?>">
	</div> <!-- end of span12 -->
</div> <!-- end of row -->




<div class="row">
	<div class="span12">

		<div class="span2 text-center offset1"><h4>Spielbeginn</h4>
			<div class="row margin-unten">
					<select name="spielbeginn_stunde" class="span4">
						<?php 
							for($i=0;$i<=23;$i++){
								if($i == $spielbeginn_stunde){
									echo "<option value=".$i." selected=selected>".$i."</option>";
								}
								else{
									echo "<option value=".$i.">".$i."</option>";
								}
							}?>
					</select>
					<span class="divider">:</span>
					<select name="spielbeginn_minute" class="span4">
						<?php 
							for($i=0;$i<=59;$i++){
								if ($i == $spielbeginn_minute){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
									echo "<option value=".$i.">".$i."</option>";
								}
							}?>
					</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Treffzeit</h4>
			<div class="row margin-unten">
					<select name="treffzeit_stunde" class="span4">
						<?php 
							for($i=0;$i<=23;$i++){
								if ($i == $treffzeit_stunde){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?>
					</select>
					<span class="divider">:</span>
					<select name="treffzeit_minute" class="span4">
						<?php 
							for($i=0;$i<=59;$i++){
								if ($i == $treffzeit_minute){
									echo "<option value=".$i." selected ='selected'>".$i."</option>";
								}
								else{
								echo "<option value=".$i.">".$i."</option>";
								}
							}?>
					</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
		
		<div class="span2 text-center offset1"><h4>Heimmannschaft</h4>
			<div class="row margin-unten">
				<input type="text" name ="heim" class="span12" value="<?php echo $heim; ?>"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
		
	</div> <!-- end of span12 -->
</div> <!-- end of row -->


<div class="row">
	<div class="span12">

		<div class="span2 text-center offset1"><h4>Spielort</h4>
			<div class="row margin-unten">
				<input type="text" name ="spielort" class="span12" value="<?php echo $spielort; ?>"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Treffort</h4>
			<div class="row margin-unten">
				<input type="text" name ="treffort" class="span12" value="<?php echo $treffpunkt; ?>"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Gastmannschaft</h4>
			<div class="row margin-unten">
				<input type="text" name ="gast" class="span12" value="<?php echo $gast; ?>"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->


	</div> <!-- end of span12 -->
</div> <!-- end of row -->	


<div class="row">
	<div class="span12 margin-unten">
		<div class="span10 text-center"><h4>Spielart</h4>
			<div class="row">
				<?php
					$sql = "SELECT * FROM spielart";
					$result = mysqli_query($con,$sql);
				?>
				<select name="spielart">
					<?php
					$counter = 1;			
					while($row = mysqli_fetch_array($result)){
						if ($row['0'] == $spielart){
							echo "<option value=".$counter." selected='selected'>".$row['1']."</option>";
						}
						else{
							echo "<option value=".$counter.">".$row['1']."</option>";
						}
						$counter++;}?>
				</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
	</div> <!-- end of span12 -->
</div> <!-- end of row -->


<div class="row">
	<div class="span12 margin-unten">
		<div class="span10 text-center"><h4>Anmerkungen</h4>
		<textarea name="anmerkungen"><?php echo $anmerkung; ?></textarea>
	</div> <!-- end of span12 -->
</div> <!-- end of row -->

<div class="row">
		<div class="span1 offset5 spiel-senden">
			<button class="btn btn-primary btn-large" type="submit">Senden</button>
	</div> <!-- end of span12 -->
</div> <!-- end of row -->

</form>
<!-- </div> -->

<?php }

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

elseif ($_GET['art'] == "training") {


}/*
***************************************
***************************************
***************************************
########  #######  ########  ######## 
   ##    ##     ## ##     ## ##       
   ##    ##     ## ##     ## ##       
   ##    ##     ## ########  ######   
   ##    ##     ## ##   ##   ##       
   ##    ##     ## ##    ##  ##       
   ##     #######  ##     ## ######## 
***************************************
***************************************
***************************************

*/
elseif($_GET['art'] == 'tore'){
	include('../connect.php');

	$hze = $_POST['halbzeit_heim'].':'.$_POST['halbzeit_gast'];
	$ee_heim = $_POST['endergebnis_heim'];
	$ee_gast = $_POST['endergebnis_gast'];
	$id = htmlentities($_GET['id']);

	$sql= 'UPDATE fussball_uebungen.spiele set halbzeitergebnis="'.$hze.'", ergebnis_heim="'.$ee_heim.'", ergebnis_gast="'.$ee_gast.'" WHERE ID="'.$_GET['id'].'"';
	$result = mysqli_query($con,$sql);

	header('Location:/index.php?page=6&art=spiele&cat=all&id='.$id);
	exit();
}
