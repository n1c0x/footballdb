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

function write_content($i)
{
	$target_path = "upload/". $_GET['id']. ".jpg";
	$filename = "$target_path";

if(file_exists($filename))
	{?>
	<a href="#bild2">
		<img class="bild bild-large" src="upload/<?php echo $_GET['id'] ?>.jpg" />
	</a>
	<div class="lightbox" id="bild2">
		<a href="#">
			<img src="upload/<?php echo $_GET['id'] ?>.jpg" />
		</a>
	</div> <!-- End of lightbox -->
	<?php
	} // end of if
	else{
		?>
	<a href="#bild2">
		<img class="bild bild-large" src="upload/default_uebung.jpeg" />
	</a>
	<div class="lightbox" id="bild2">
		<a href="#">
			<img src="upload/default_uebung.jpeg" />
		</a>
	</div> <!-- End of lightbox -->
<?php
	} // end of else
} // end of function


?>


<div class="row-fluid">
	<div class="span6 offset3">
		<?php
			$sql2 = "SELECT * FROM uebungen
									LEFT JOIN gruppierung
									ON uebungen.gruppierung = gruppierung.ID
									LEFT JOIN uebungsart
									ON uebungen.uebungsart = uebungsart.ID
									LEFT JOIN laenge
									ON uebungen.dauer = laenge.id
									WHERE uebungen.ID = ".$_GET['id']."";

			$sql = mysqli_query($con,$sql2);

			while ($res = mysqli_fetch_array($sql))
				{?>
		<div class="row-fluid">
			<div class="span12 text-center">
				<h2 class="text-center"><?php echo $res[1] ?></h2> <!-- Title -->
				<?php echo $res[7] ?> - <?php echo date("d.m.Y", $res[2]) ?> <!-- Date -->
			</div> <!-- Ende von span12 -->
		</div> <!-- Ende von row-fluid -->

		<div class="row-fluid">

					<table class="span12 large margin-oben margin-unten">
						<tr>
							<td class="span6"><strong><u>Dauer</u></strong></td>
							<td class="span6"><strong><u>Phase</u></strong></td>
							<td class="span6"><strong><u>&Uuml;bungsart</u></strong></td>
						</tr>
						<tr>
							<td class="span6"><?php echo $res['laenge'] ?> Minute(n)</td>
							<td class="span6"><?php echo $res[11] ?></td>
							<td class="span6"><?php echo $res[13] ?></td>
						</tr>
					</table>

				</div> <!-- Ende von span 12 large -->



		<div class="row-fluid">
				<div class="span12 large">
					<dl>
						<dt><u>Organisation</u></dt>
						<dd><?php echo $res[3] ?></dd>
					</dl> <!-- Organisation -->
				</div> <!-- Ende von span 12 large -->
		</div> <!-- Ende von row-fluid -->

		<div class="row-fluid">
				<div class="span12 large">
					<dl>
						<dt><u>Durchf&uuml;hrung</u></dt>
						<dd><?php echo $res[4] ?></dd>
					</dl> <!-- Durch. -->
				</div> <!-- Ende von span 12 large -->
		</div> <!-- Ende von row-fluid -->

		<div class="row-fluid">
				<div class="span12 large">
					<dl>
						<dt><u>Hinweise</u></dt>
						<dd><?php echo $res[5] ?></dd>
					</dl> <!-- Hinweis -->
				</div> <!-- Ende von span12 large -->
		</div> <!-- Ende von row-fluid -->

<div class="row">
	<div class="span12 text-center">
		<?php echo write_content($_GET['id']); ?>
	</div> <!-- Ende von span12 large -->
</div> <!-- Ende von row-fluid -->

<div class="row" id="top-margin-buttons">
	<div class="span12 text-center">
		<button class="btn btn-primary" type="button" onclick="window.location.href='index.php?page=5&id=<?php echo $_GET['id'];?>&art=uebungen'"/>Bearbeiten</button>
		<button class="btn" type="button" onclick="window.close();" />Schlie&szlig;en</button>
	</div> <!-- Ende von span12 large -->
</div> <!-- Ende von row-fluid -->


	</div> <!-- Ende von span6 -->
</div> <!-- Ende von row-fluid -->

<?php
	} /* end of while */
} /* end of if */


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

	$sql=mysqli_query($con,"SELECT * FROM spiele
					  LEFT JOIN spielart
					  ON spiele.spielart = spielart.ID
					  WHERE spiele.ID=".$_GET['id']."");

	$row = mysqli_fetch_array($sql);

	$sql2=mysqli_query($con,"SELECT * FROM tore
					  LEFT JOIN spieler
					  ON tore.torschuetze = spieler.SID
					  LEFT JOIN torart
					  ON tore.torart = torart.id
					  WHERE tore.spiele_id=".$_GET['id']." ORDER BY minute ASC") or die (mysql_error());?>

<div class="container">

	<div class="row">
		<h2 class="span12 text-center"><?php echo $row['15'].' am '.date('d.m.Y',$row['1']) ?></h2>
	</div> <!-- Ende von row-fluid -->
	<div class="row">
		<h3 class="span12 text-center"><?php echo $row["6"].' - '.$row["7"]?></h3>
	</div> <!-- Ende von row-fluid -->

	<div class="row text-center">
			<ul class="nav nav-tabs">
				<?php

					if(isset($_GET["cat"])){
						switch ($_GET["cat"]) {
							case 'all':?>
								<li class="active">
									<a href="?page=6&art=spiele&cat=all&id=<?php echo $row[0]?>">Allgemein</a>
								</li>
								<li>
									<a href="?page=6&art=spiele&cat=auf&id=<?php echo $row[0]?>">Aufstellung</a>
								</li>
								<li>
									<a href="?page=6&art=spiele&cat=an&id=<?php echo $row[0]?>">Anmerkung</a>
								</li>
								</div> <!-- End of row-fluid -->
							<?php
								include("allgemein.php");
								break;
							case 'auf':?>
								<li>
									<a href="?page=6&art=spiele&cat=all&id=<?php echo $row[0]?>">Allgemein</a>
								</li>
								<li class="active">
									<a href="?page=6&art=spiele&cat=auf&id=<?php echo $row[0]?>">Aufstellung</a>
								</li>
								<li>
									<a href="?page=6&art=spiele&cat=an&id=<?php echo $row[0]?>">Anmerkung</a>
								</li>
								</div> <!-- End of row-fluid -->
							<?php
								include("aufstellung.php");
								break;
							case 'auf_aen':?>
								<li>
									<a href="?page=6&art=spiele&cat=all&id=<?php echo $row[0]?>">Allgemein</a>
								</li>
								<li class="active">
									<a href="?page=6&art=spiele&cat=auf&id=<?php echo $row[0]?>">Aufstellung</a>
								</li>
								<li>
									<a href="?page=6&art=spiele&cat=an&id=<?php echo $row[0]?>">Anmerkung</a>
								</li>
								</div> <!-- End of row-fluid -->
							<?php
								include("aufstellung.php");
								break;
							case 'an':?>
								<li>
									<a href="?page=6&art=spiele&cat=all&id=<?php echo $row[0]?>">Allgemein</a>
								</li>
								<li>
									<a href="?page=6&art=spiele&cat=auf&id=<?php echo $row[0]?>">Aufstellung</a>
								</li>
								<li class="active">
									<a href="?page=6&art=spiele&cat=an&id=<?php echo $row[0]?>">Anmerkung</a>
								</li>
								</div> <!-- End of row-fluid -->
							<?php
								include("anmerkung.php");
								break;

							default:
								include("allgemein.php");
								break;
						}
					}

} /* end of elseif */

 ?>
