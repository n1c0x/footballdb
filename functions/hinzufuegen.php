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

if ($_GET['art'] == 'uebungen')
{
?>

<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 text-center offset2">&Uuml;bung hinzuf&uuml;gen</h2>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

<form name="Uebungen" action="/functions/formular.php?art=uebungen" method="post" enctype="multipart/form-data" class="form-horizontal">

<div class="row-fluid">
	<div class="span6">
		<div class="control-group">
			<label class="control-label">Titel</label>
			<div class="controls">
				<input class="span10" type="text" name="titel" placeholder="Titel der &Uuml;bung"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Datum</label>
			<div class="controls controls-row">
				<input type="date" name="datum">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Organisation</label>
			<div class="controls">
				<textarea name="organisation" rows="5" cols="10" placeholder="Organisation" class="span10"></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Hinweise</label>
			<div class="controls">
				<textarea name="hinweise" rows="5" cols="10" placeholder="Hinweise" class="span10"></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->

	</div> <!-- end of span5 -->

	<div class="span6">
		<div class="control-group">
			<label class="control-label">Phase</label>
			<div class="controls">
				<select name="gruppierung">
				<?php
					$sql = "SELECT gruppierung.name FROM gruppierung";
					$result = mysqli_query($con,$sql);
					$counter = 1;			
					while($row = mysqli_fetch_array($result)){
					echo "<option value=".$counter.">".$row[0]."</option>";
					$counter++;
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
				<textarea name="durchfuehrung" rows="5" cols="10" placeholder="Durchf&uuml;hrung" class="span10"></textarea>
			</div>  <!-- End of controls -->
		</div> <!-- End of control-group -->
<output id="list"></output>
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
						echo "<option value=".$counter.">".$row_laenge['laenge']."</option>";
						$counter++;
					}?>
				</select> Minuten
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Author</label>
			<div class="controls">
					<input type="text" name="author" value="Bernhard Walther" style="width:170px"/>
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

elseif ($_GET['art'] == 'spieler') 
{
?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="span4 offset3 text-center">Spieler hinzuf&uuml;gen</h2>
	</div> <!-- end of span12 -->
</div> <!-- end of row-fluid -->

<form name="spieler" action="/functions/formular.php?art=spieler" method="post" enctype="multipart/form-data" class="form-horizontal">

<div class="row-fluid">
	<div class="span6">
		<div class="control-group">
			<label class="control-label">Vorname</label>
			<div class="controls">
				<input type="text" placeholder="Vorname" name="vorname">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Name</label>
			<div class="controls">
				<input type="text" placeholder="Name" name="name">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Adresse</label>
			<div class="controls controls-row">
				<input type="text" placeholder="Stra&szlig;e" class="input-xlarge" name="strasse">
				<input type="text" placeholder="Nr." class="input-mini" name="hausnummer"/>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Stadt</label>
			<div class="controls controls-row">
				<input type="text" placeholder="Stadt" class="input-xlarge" name="stadt">
				<input type="text" placeholder="PLZ" name="PLZ" maxlength="6" class="input-mini">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Festnetz</label>
			<div class="controls controls-row">
				<input type="text" name="vorwahl_festnetz" maxlength="6" class="input-mini"> <span class="divider">/</span>
				<input type="text" name="telefon_nr">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Handy</label>
			<div class="controls controls-row">
				<input type="text" name="vorwahl_handy" maxlength="6" class="input-mini"> <span class="divider">/</span>
				<input type="text" name="handy_nr">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->
	</div> <!-- end of span6 -->

	<div class="span6">
		<div class="control-group">
			<label class="control-label">Pass-Nr:</label>
			<div class="controls">
				<input type="text" placeholder="Pass-Nr" name="pass_nr">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">St&auml;rken:</label>
			<div class="controls">
				<input type="text" placeholder="St&auml;rken" name="staerken">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Schw&auml;chen:</label>
			<div class="controls">
				<input type="text" placeholder="Schw&auml;chen" name="schwaechen">
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<div class="control-group">
			<label class="control-label">Position</label>
			<div class="controls">
				<?php
				$sql = "SELECT * FROM position";
				$result = mysqli_query($con,$sql); ?>
				<select name="id_position" class="input-medium">
					<?php
						$counter = 1;			
						while($row = mysqli_fetch_array($result)){
						echo "<option value=".$counter.">".$row[1]."</option>";
						$counter++;
					}?>
				</select>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

		<output id="list"></output>
	</div> <!-- end of span6 -->
</div> <!-- end of row-fluid -->

<div class="row-fluid">
	<div class="span6 offset3">
		<div class="control-group">
			<label class="control-label">Bild</label>
			<div class="controls">
					<input type="file" name="files[]" id="files" value="blah" style="border:none;width:100px"/>
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
			<div class="controls">
				<button type="button" class="btn" onclick="window.location.href='?page=2&art=spieler'">Zur&uuml;ck</button>
				<button type="submit" class="btn btn-primary"  onclick="if (!confirm('Wollen Sie wirklich den Eintrag hinzuf&uuml;gen?')) {return false;} ;">Speichern</button>
			</div> <!-- End of controls -->
		</div> <!-- End of control-group -->

	</div> <!-- end of span6 -->
</div> <!-- end of row-fluid -->
</form>

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

elseif ($_GET['art'] == 'training') 
{
?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 offset2 text-center">Training hinzuf&uuml;gen</h2>
	</div> <!-- end of span12 -->
</div> <!-- end of row-fluid -->

			
<div class="row">
	<div class="span4 offset1">
			<form name="phase" action="index.php?page=1&art=training" method="GET" >
			<input type="hidden" name="page" value="1">
			<input type="hidden" name="art" value="training">

			<div class="control-group">
				<label class="control-label">Phase</label>
				<div class="controls">
					<select name="phase" class="span10">
					<option value="0">Alle &Uuml;bungen</option>
					<?php 
						$sql = "SELECT * FROM gruppierung";
						$result = mysqli_query($con,$sql);
						$j=1;
						$count_gruppierung = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM gruppierung"));
						for($i=1;$i<=$count_gruppierung[0];$i++){
						$count_uebungen_gruppierung = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM uebungen WHERE gruppierung=".$i.""));
						$count_uebungen[$i] = $count_uebungen_gruppierung[0];
						}
						while($row = mysqli_fetch_array($result)){
							$count = $j;
							if(isset($_GET['phase'])){	
								if($_GET['phase']==$row['ID']){
									echo "<option value=".$row['ID']." selected='selected'>".$row['name']." (".$count_uebungen[$count].")</option>";}
								else{
									echo "<option value=".$row['ID'].">".$row['name']." (".$count_uebungen[$count].")</option>";}
							}
							else{
								echo "<option value=".$row['ID'].">".$row['name']." (".$count_uebungen[$count].")</option>";}
							$j++;
					}?>
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->

			<div class="control-group">
				<label class="control-label">Art</label>
				<div class="controls">
					<select name="uebungen_art" class="span10">
					<option value="0"></option>
					<?php 
					$sql = "SELECT * FROM uebungsart";
					$result = mysqli_query($con,$sql);
					$j=1;
					$count_art = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM uebungsart"));
					for($i=1;$i<=$count_art[0];$i++){
						$count_uebungen_art = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM uebungen WHERE uebungsart=".$i.""));
						$count_art[$i] = $count_uebungen_art[0];
						}
					while($row = mysqli_fetch_array($result)){
						$count = $j;
						if(isset($_GET['phase'])){
							if($_GET['uebungen_art']==$row['ID']){
								echo "<option value=".$row['ID']." selected='selected'>".$row['art']." (".$count_art[$count].")</option>";}
							else{
								echo "<option value=".$row['ID'].">".$row['art']." (".$count_art[$count].")</option>";}
						}
						else{
								echo "<option value=".$row['ID'].">".$row['art']." (".$count_art[$count].")</option>";}
						$j++;
					}?>
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<button type="submit" class="btn offset3" id="uebung-suchen">&Uuml;bung Suchen</button>

			<div class="control-group">
				<label class="control-label">&Uuml;bungen:</label>
				<div class="controls" id="p_training_uebungen">
					<select name="uebungen[]" id='LstSource0' size="10" multiple="multiple" class="span10" ondblclick='Add(0);'>
						<?php 
						$sql = '';
						$phase;
						$art;
						if(isset($_GET['phase'])){$phase = $_GET['phase'];}else{$phase='';}
						if(isset($_GET['uebungen_art'])){$art = $_GET['uebungen_art'];}else{$art='';}

						if($art=='0' && $phase =='0'){
							$sql='SELECT uebungen.id,uebungen.titel FROM uebungen';}
						elseif($art=='0'){
							$sql = "SELECT uebungen.id,uebungen.titel FROM uebungen WHERE uebungen.gruppierung = ".$phase;
						}
						else{
							// $art = $_GET['uebungen_art'];
							$sql = "SELECT uebungen.id,uebungen.titel FROM uebungen WHERE uebungen.gruppierung = ".$phase." AND uebungen.uebungsart = ".$art;
						}
						if($sql!=''){
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo "<option value=".$row['id'].">".$row['titel']."</option>";}
						}?>
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<!-- <p class="offset1 muted"><small>Mit Strg-Taste mehrere &Uuml;bungen ausw&auml;hlen</small></p> -->
		</form>

			<div class="control-group">
				<label class="control-label">Spieler:</label>
				<div class="controls" id="p_training_uebungen">
					<select name="spieler[]" id='LstSource1' size="10" multiple="multiple" class="span10" ondblclick='Add(1);'>
						<?php 
						$sql = "SELECT spieler.SID,spieler.name, spieler.vorname FROM spieler";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo "<option value=".$row['SID'].">".$row['name']." ".$row['vorname']."</option>";}
						?>
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<!-- <p class="offset1 muted"><small>Mit Strg-Taste mehrere Spieler ausw&auml;hlen</small></p> -->
	</div> <!-- end of span5 -->

	<div class="span2">
		<button class="btn btn-success span7 margin-oben260" type="button" onclick="Add(0)">
			<?php for($i=1;$i<=4;$i++){echo '<i class="icon-chevron-right icon-white"></i>';}?></button>
		<button class="btn btn-danger span7 margin-oben" type="button" onclick="Remove(0)">
			<?php for($i=1;$i<=4;$i++){echo '<i class="icon-chevron-left icon-white"></i>';}?></button>

		<button class="btn btn-success span7 margin-oben125" type="button" onclick="Add(1)">
			<?php for($i=1;$i<=4;$i++){echo '<i class="icon-chevron-right icon-white"></i>';}?></button>
		<button class="btn btn-danger span7 margin-oben" type="button" onclick="Remove(1)">
			<?php for($i=1;$i<=4;$i++){echo '<i class="icon-chevron-left icon-white"></i>';}?></button>
	</div>

	<div class="span4">

		<form name="training" action="/functions/formular.php?art=training" method="POST" class="margin-oben125">
			<div class="control-group">
				<label class="control-label">Datum</label>
				<div class="controls controls-row">
					<input type="date" name="datum">
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<div class="control-group">
				<label class="control-label">Ausgew&auml;hlte &Uuml;bungen</label>
				<div class="controls controls-row">
					<select name="uebungen[]" id='LstTarget0' size="10" multiple="multiple" class="span10" ondblclick='Remove(0);'>
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<div class="control-group margin-oben20">
				<label class="control-label">Ausgew&auml;hlte Spieler</label>
				<div class="controls controls-row">
					<select name="spieler[]" id='LstTarget1' size="10" multiple="multiple" class="span10" ondblclick='Remove(1);'>
						
					</select>
				</div> <!-- End of controls -->
			</div> <!-- End of control-group -->
			<button class="btn btn-primary" type="submit">Training erstellen</button>
		</form>
	</div> <!-- end of span6 -->
</div> <!-- End of row-fluid -->


<?php 

$row_uebungen = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM uebungen"));
$row_spieler = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM spieler"));

?>

<script type="text/javascript">
var NbSourceUeb = <?php echo $row_uebungen[0]?>;
var NbSourceSpi = <?php echo $row_spieler[0]?>;
var NbCibleUeb = 0;
var NbCibleSpi = 0;

function Add(input)
{
	var NbEle = -1;
	var TxtEle = '';
	var TxtVal = '';
	// alert(NbSource);
	for(i = 0; i < document.getElementById('LstSource' + input).length; i++){
		if (document.getElementById('LstSource' + input).options[i].selected){
		NbEle = i;
		TxtEle = document.getElementById('LstSource' + input).options[i].text;
		TxtVal = document.getElementById('LstSource' + input).options[i].value;
		}
	}

	if(input == 0){
		if (NbSourceUeb != 0 && NbEle != -1){
		document.getElementById('LstSource' + input).options[NbEle] = null;
		document.getElementById('LstTarget' + input).options[NbCibleUeb] = new Option(TxtEle);
		document.getElementById('LstTarget' + input).options[NbCibleUeb].value = TxtVal;
		document.getElementById('LstTarget' + input).options[NbCibleUeb].selected = true;
		NbCibleUeb = NbCibleUeb + 1;
		NbSourceUeb = NbSourceUeb - 1;
		}
	}
	else if(input ==1){
		if (NbSourceSpi != 0 && NbEle != -1){
		document.getElementById('LstSource' + input).options[NbEle] = null;
		document.getElementById('LstTarget' + input).options[NbCibleSpi] = new Option(TxtEle);
		document.getElementById('LstTarget' + input).options[NbCibleSpi].value = TxtVal;
		document.getElementById('LstTarget' + input).options[NbCibleSpi].selected = true;
		NbCibleSpi = NbCibleSpi + 1;
		NbSourceSpi = NbSourceSpi - 1;
		}
	}
}

function Remove(input)
{
	var NbEle = -1;
	var TxtEle = '';
	var TxtVal = '';
	for(i = 0; i < document.getElementById('LstTarget' + input).length; i++){
		if (document.getElementById('LstTarget' + input).options[i].selected){
		NbEle = i;
		TxtEle = document.getElementById('LstTarget' + input).options[i].text;
		TxtVal = document.getElementById('LstSource' + input).options[i].value;
		}
	}

	if(input == 0){
		if (NbSourceUeb != 0 && NbEle != -1){
		document.getElementById('LstTarget' + input).options[NbEle] = null;
		document.getElementById('LstSource' + input).options[NbCibleUeb] = new Option(TxtEle);
		document.getElementById('LstSource' + input).options[NbCibleUeb].value = TxtVal;
		NbCibleUeb = NbCibleUeb + 1;
		NbSourceUeb = NbSourceUeb - 1;
		}
	}
	else if(input ==1){
		if (NbSourceSpi != 0 && NbEle != -1){
		document.getElementById('LstTarget' + input).options[NbEle] = null;
		document.getElementById('LstSource' + input).options[NbCibleSpi] = new Option(TxtEle);
		document.getElementById('LstSource' + input).options[NbCibleSpi].value = TxtVal;
		NbCibleSpi = NbCibleSpi + 1;
		NbSourceSpi = NbSourceSpi - 1;
		}
	}
	
}
</script>

<?php
}

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

elseif ($_GET['art'] == 'spiele') 
{
?>
<div class="row">
		<h2 class="span4 offset3 text-center">Spiel hinzuf&uuml;gen</h2>
</div> <!-- end of row -->

<form name="spiele" method="POST" action="/functions/formular.php?art=spiele" enctype="multipart/form-data" class="form-horizontal">


<div class="row">
		<div class="span10 text-center"><h4>Datum</h4></div>
</div> <!-- end of row -->

<div class="row">
	<div class="span10 text-center margin-unten">
		<input type="date" name="datum">
	</div> <!-- end of span12 -->
</div> <!-- end of row -->




<div class="row">
	<div class="span12">

		<div class="span2 text-center offset1"><h4>Spielbeginn</h4>
			<div class="row margin-unten">
					<select name="spielbeginn_stunde" class="span4">
						<?php for($i=0;$i<=23;$i++){echo "<option value=".$i.">".$i."</option>";}?>
					</select>
					<span class="divider">:</span>
					<select name="spielbeginn_minute" class="span4">
						<?php for($i=0;$i<=59;$i++){echo "<option value=".$i.">".$i."</option>";}?>
					</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Treffzeit</h4>
			<div class="row margin-unten">
					<select name="treffzeit_stunde" class="span4">
						<?php for($i=0;$i<=23;$i++){echo "<option value=".$i.">".$i."</option>";}?>
					</select>
					<span class="divider">:</span>
					<select name="treffzeit_minute" class="span4">
						<?php for($i=0;$i<=59;$i++){echo "<option value=".$i.">".$i."</option>";}?>
					</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
		
		<div class="span2 text-center offset1"><h4>Heimmannschaft</h4>
			<div class="row margin-unten">
				<input type="text" name ="heim" class="span12"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
		
	</div> <!-- end of span12 -->
</div> <!-- end of row -->


<div class="row">
	<div class="span12">

		<div class="span2 text-center offset1"><h4>Spielort</h4>
			<div class="row margin-unten">
				<input type="text" name ="spielort" class="span12"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Treffort</h4>
			<div class="row margin-unten">
				<input type="text" name ="treffort" class="span12"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->

		<div class="span2 text-center offset1"><h4>Gastmannschaft</h4>
			<div class="row margin-unten">
				<input type="text" name ="gast" class="span12"/>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->


	</div> <!-- end of span12 -->
</div> <!-- end of row -->	


<div class="row">
	<div class="span12 margin-unten">
		<div class="span10 text-center"><h4>Spielart</h4>
			<div class="row">
				<?php
					$sql = "SELECT spielart.name FROM spielart";
					$result = mysqli_query($con,$sql);
				?>
				<select name="spielart">
					<?php
					$counter = 1;			
					while($row = mysqli_fetch_array($result)){
						echo "<option value=".$counter.">".$row['name']."</option>";
						$counter++;}?>
				</select>
			</div> <!-- end of row -->
		</div> <!-- end of span2 text-center -->
	</div> <!-- end of span12 -->
</div> <!-- end of row -->


<div class="row">
	<div class="span12 margin-unten">
		<div class="span10 text-center"><h4>Anmerkungen</h4>
		<textarea name="anmerkungen"></textarea>
	</div> <!-- end of span12 -->
</div> <!-- end of row -->

<div class="row">
		<div class="span1 offset5 spiel-senden">
			<button class="btn btn-primary btn-large" type="submit">Senden</button>
	</div> <!-- end of span12 -->
</div> <!-- end of row -->

</form>
<?php } ?>