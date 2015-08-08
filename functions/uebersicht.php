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

if ($_GET['art'] == "uebungen"){
	$sql = "SELECT * FROM uebungen
							LEFT JOIN gruppierung
							ON uebungen.gruppierung = gruppierung.ID
							LEFT JOIN uebungsart
							ON uebungen.uebungsart = uebungsart.ID ";

	$result2 = mysqli_query($con,$sql);
?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 text-center offset2">&Uuml;bersicht</h2>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

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
	<tr id="top-table">
		<td><a href='?page=6&art=uebungen&id=<?php echo $row[0]?>'>
			<strong><?php echo $row[1]?></strong></a>
			<table class="table ">
				<tr>
					<td><u>Phase:</u></td>
					<td><?php echo $row[11]?></td>
				</tr>
				<tr><td><u>&Uuml;bungsart:</u></td>
					<td><?php echo $row[13]?></td>
				</tr>
			</table>
		</td>

		<td>
			<a href='?page=6&art=uebungen&id=<?php echo $row[0]?>' target='_blank'>
				<?php
				if(file_exists($filename)){
				?>
					<img class="bild bild-small" src="upload/<?php echo $row[0]?>.jpg" >
				<?php
				}
				else{
				?>
						<img class="bild bild-small" src="upload/default_uebung.jpeg"/>
				<?php } ?>
			</a>
		</td>

				<td width="50px" id="top-margin-buttons">
					<a href='?page=5&id=<?php echo $row["0"]?>&art=uebungen' class="no_underline">
						<img src='img/alter.png' width="30px" height="30px"/>
					</a>
					<a href = 'functions/delete.php?id=<?php echo $row[0]?>&art=uebungen' class="no_underline" onclick="if (!confirm('Wollen Sie wirklich den Eintrag l&ouml;schen?')) {return false;} ";>
						<img src="img/delete.png" width="30px" height="30px">
					</a>
				</td>
	</tr>

		<?php
			$i++;
		}?>
	</table>

	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->
<?php
} /* end of if */

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


elseif ($_GET['art'] == "spieler")
{
?>

<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 text-center offset2">&Uuml;bersicht</h2>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

<div class="row-fluid">

<?php
	$sql = "SELECT * FROM spieler LEFT JOIN position ON spieler.id_position = position.id";
	$result2 = mysqli_query($con,$sql) or die ("mysqli-Error: " . mysqli_error());
	$i=0;

	while($row = mysqli_fetch_array($result2))
	{
		$target_path = "upload/spieler/".$row[0].".jpg";
		$filename = "$target_path";
		?>

		<div class="rounded-border player">
	<?php
		if(file_exists($filename))
		{?>
				<img class="bild" src="upload/spieler/<?php echo $row[0]?>.jpg" />
<?php
		}
		else
		{?>
				<img class="bild" src="upload/spieler/default_spieler.jpeg"/>
<?php
		} // End of else
?>
				<table>
					<tr>
						<td><u>Name:</u></td> <td><?php echo $row[2]?> <?php echo $row[1]?></td>
					<tr>
					<tr>
						<td><u>Adresse:</u> </td> <td><?php echo $row[3]?> <?php echo $row[4]?><br /><?php echo $row[5]?> <?php echo $row[6]?></td>
					<tr>
					<tr>
						<td><u>Telefon:</u> </td> <td><?php echo $row[7]?> / <?php echo $row[8]?></td>
					<tr>
					<tr>
						<td><u>Handy:</u> </td> <td><?php echo $row[9]?> / <?php echo $row[10]?></td>
					<tr>
					<tr>
						<td><u>Pass-Nummer:</u> </td> <td><?php echo $row[11]?></td>
					<tr>
					<tr>
						<td><u>Position:</u></td> <td><?php echo $row[16]?></td>
					<tr>
					<tr>
						<td><u>St&auml;rken:</u></td> <td><?php echo $row[13]?></td>
					<tr>
					<tr>
						<td><u>Schw&auml;chen:</u></td> <td><?php echo $row[14]?></td>
					<tr>
				</table>
				<div class="span12 text-center margin-oben">
					<a href='?page=5&id=<?php echo $row["0"]?>&art=spieler' class="no_underline">
						<img src='img/alter.png' width="30px" height="30px" />
					</a>
					<a href = 'functions/delete.php?id=<?php echo $row[0]?>&art=spieler' class="no_underline" onclick="if (!confirm('Wollen Sie wirklich den Eintrag l&ouml;schen?')) {return false;} ;" />
						<img src='img/delete.png' width="30px" height="30px" style="border:0px"/>
					</a>
				</div> <!-- End of span1 -->
	</div> <!-- End of rounded-border player -->

<?php $i++;} //End of while?>

</div> <!-- End of row-fluid -->

<?php } // End of elseif


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


elseif ($_GET['art'] == "spiele")
{
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

$result = mysqli_query($con,$sql);
	?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="span6 text-center offset2">Spiele</h2>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

			<table class="table table-striped table-bordered " id="table-spiele">
				<tr>
					<th class="clear"></th>
					<th><a href="?page=2&art=spiele&sort=spielart">Spielart &darr;</a></th>
					<th><a href="?page=2&art=spiele">Datum &darr;</a></th>
					<th>Spielbeginn</th>
					<th>Spielort</th>
					<th>Treffzeit</th>
					<th>Treffort</th>
					<th>Heimmannschaft</th>
					<th>Gastmannschaft</th>
					<th>Ergebnis</th>
					<th></th>
				</tr>
	<?php
	$i = 0;
	while($row = mysqli_fetch_array($result))
	{?>

			<td class="clear">
				<a href="?page=6&art=spiele&cat=all&id=<?php echo $row[0] ?>" target=_blank  class="no_underline">
					<img src="img/ball.png" width=40px>
				</a>
			</td>
			<td><?php echo $row["15"]?></td>
			<td><?php echo date('d.m.Y',$row['1'])?></td>
			<td><?php echo date('H:i',$row['2'])?></td>
			<td><?php echo $row["3"]?></td>
			<td><?php echo date('H:i',$row['4'])?></td>
			<td><?php echo $row["5"]?></td>
			<td><?php echo $row["6"]?></td>
			<td><?php echo $row["7"]?></td>
			<td><?php echo $row["11"].':'.$row["12"]?></td>
			<td>
			<a href='?page=5&id=<?php echo $row["0"]?>&art=spiele' class="no_underline" >
				<img src='img/alter.png' width="30px" height="30px"/>
			</a>
			<a href = "functions/delete.php?id=<?php echo $row[0]?>&art=spiele" class="no_underline" onclick="if (!confirm('Wollen Sie wirklich den Eintrag l&ouml;schen?')) {return false;} ;" >
			<img src='img/delete.png' width="30px" height="30px" >
			</a>
			</td>
		</tr>
	<?php $i++;	}?>
	</table>
</div>

<?php } /* end of if */

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


elseif ($_GET['art'] == "training")
{

$query_training = mysqli_query($con,"SELECT * from training ORDER BY datum");

$count_training = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM training"));

while($row_training = mysqli_fetch_array($query_training)){

	$query_uebungen = mysqli_query($con,"SELECT
												id_training_id_uebungen.id_training AS id_tr,
												id_training_id_uebungen.id_uebungen AS id_ue,
												uebungen.titel AS titel,
												uebungen.dauer AS dauer,
												uebungen.ID
											FROM id_training_id_uebungen
											INNER JOIN uebungen
											ON id_training_id_uebungen.id_uebungen=uebungen.ID
											WHERE id_training=".$row_training['id']);
	$query_spieler = mysqli_query($con,"SELECT
												id_training_id_spieler.id_training AS id_tr,
												id_training_id_spieler.id_spieler AS id_sp,
												spieler.name AS nachname,
												spieler.vorname AS vorname
											FROM id_training_id_spieler
											INNER JOIN spieler
											ON id_training_id_spieler.id_spieler=spieler.SID
											WHERE id_training=".$row_training['id']);
	?>
<div class="row">
	<div class="span10 offset1 rounded-border training-container">
		<h3 class="offset4">Training vom <?php echo date("d/m/Y",$row_training['datum'])?> </h3>
		<div class="span5 offset1">

			<h4>&Uuml;bungen:</h4>
			<dl>
				<?php
					while($row_uebungen = mysqli_fetch_array($query_uebungen)){?>
						<dt><a href="/functions/anzeigen.php?art=uebungen&id=<?php echo $row_uebungen['ID'];?>" target=_blank><?php echo $row_uebungen['titel']; ?></a></dt>
						<?php
						echo "<dd><i class='icon-time'></i> ".$row_uebungen['dauer']." Minute(n)</dd>";
					}

				?>
			</dl>
		</div> <!-- End of "beteiligte Übungen" -->
		<div class="span3">
			<h4>Spieler:</h4>
			<ul class="unstyled">
				<?php
					while($row_spieler = mysqli_fetch_array($query_spieler)){
						echo '<li><i class="icon-user"></i> '.$row_spieler['vorname'].' '.$row_spieler['nachname'].'</li>';
					}

				?>
			</ul>
		</div> <!-- End of "beteiligte spieler" -->
	</div>
</div><br>
<?php
} // End of while
echo "</div>";
} // End of elseif
?>
