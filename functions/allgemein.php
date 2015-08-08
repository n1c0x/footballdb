<table class="table table-bordered" id="table-spiele">
		<tr>
			<th><b><u>Spielbeginn</th>
			<th><b><u>Spielort</th>
			<th><b><u>Treffzeit</th>
			<th><b><u>Treffort</th>
			<th><b><u>Ergebnis</th>
			<th><b><u>Halbzeitergebnis</th>
			<th></th>
		</tr>
		<tr>
			<td><?php echo date("H:i",$row["2"]) ?></td>
			<td><?php echo $row["3"] ?></td>
			<td><?php echo date("H:i",$row["4"]) ?></td>
			<td><?php echo $row["5"] ?></td>
			<td><?php echo $row["11"] ?>:<?php echo $row["12"] ?></td>
			<td><?php echo $row["10"] ?></td>
			<td>
				<a href="?page=5&art=spiele&id=<?php echo $row['0']?>" class="no_underline">
					<img src='../img/alter.png' width="30px" height="30px" />
				</a>
				<a href = "delete.php?art=spiele&id=<?php echo $row['0'] ?>" onclick="if (!confirm('Wollen Sie wirklich den Eintrag l&ouml;schen?')) {return false;} "; >
					<img src='../img/delete.png' width="30px" height="30px" />
				</a>
			</td>
		</tr>
	</table>

	<div class="row">
			<table class="table table-striped table-condensed table-bordered" id="table-tore">
				<tr>
					<th>Minute</th>
					<th>Torsch&uuml;tze</th>
					<th>Torart</th>
				</tr>
				<?php
					$tore = $row['11'] + $row['12'];
					$sql3 = "SELECT COUNT(*) from tore WHERE tore.spiele_id=".$_GET['id']."";
					$result = mysqli_query($con,$sql3);
					$row = mysqli_fetch_array($result);
					$u=1;
					while($data = mysqli_fetch_array($sql2)){
						echo '
						<tr>
							<td>'.$data['2'].' Min.</td>
							<td>'.$data['7'].' '.$data['6'].'</td>
							<td>'.$data['21'].'</td>
						</tr>';
					}
					if ($tore != $row['0'] ){
						$u=2;
					}
					else{
						$u=5;
					}
				?>
			</table>
	</div> <!-- end of row -->

	<div class="row">
		<div class="span4 text-center offset4 margin-oben">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
							Ergebnis &Auml;ndern
						</a>
					</div> <!-- end of accordion-heading -->
					<div id="collapseSeven" class="accordion-body collapse">
						<div class="accordion-inner">
							<form action="/functions/aendern.php?art=tore&id=<?php $id = $_GET['id']; echo $id; ?>" method="POST">
								<table>
									<tr>
										<td>Halbzeit:</td>
										<td>
											<input type="text" name="halbzeit_heim" maxlength=2 class="input-mini">
											<span class="divider">:</span>
											<input type="text" name="halbzeit_gast" maxlength=2 class="input-mini"/>
										</td>
									</tr>
									<tr>
										<td>Endergebnis:</td>
										<td>
											<input type="text" name="endergebnis_heim" maxlength=2 class="input-mini" >
											<span class="divider">:</span>
											<input type="text" name="endergebnis_gast" maxlength=2 class="input-mini"/>
										</td>
									</tr>
								</table>	
								<button type="submit" class="btn btn-primary"/>Senden</button>
							</form>
						</div> <!-- end of accordion-inner -->
					</div> <!-- end of accordion-body collapse -->
				</div> <!-- end of accordion-group -->
			</div> <!-- end of accordion -->
		</div> <!-- end of span3 -->
	</div> <!-- end of row -->



<?php

if ($u == 1 || $u == 2){
	$counter=1;
	$endergebnis= $tore;
	$id = $_GET['id'];

	if (isset ($endergebnis)){?>
		<form action="/functions/formular.php?art=tore&id=<?php echo $id ?>" method="POST">
			<div class="container text-center">
				<?php
				$j=1;

				if ($counter <= $endergebnis) {?>
				<p><b><u>Tore:</u></b></p>
				<?php
				}
				while ($counter <= $endergebnis)
				{
					if ($counter <= $endergebnis){
						echo '<hr>'; }?>	
					
					<label><?php echo $counter; ?>Tor: </label>
					<select name="minute<?php echo $j; ?>">
						<optgroup label="1. Halbzeit">
							<?php
							for($i=1;$i<46;$i++){
								echo '<option value="'.$i.'">'.$i.'Min.</option>';
							}?>
						</optgroup>
						<optgroup label="2. Halbzeit">
							<?php
							for($i=46;$i<91;$i++){	
								echo '<option value="'.$i.'">'.$i.'Min.</option>';
							}?>
						</optgroup>
					</select>
					<select name="torschuetze<?php echo $j;?>">
							<?php
							$sql="SELECT spieler.SID, spieler.name, spieler.vorname FROM spieler";
							$result = mysqli_query($con,$sql);?>
						<option value="0"></option>
							<?php
							while($row = mysqli_fetch_array($result)){?>
						<option value="<?php echo $row['0'] ?>"><?php echo $row['2'].' '.$row['1'] ?></option>';
							<?php } ?>
					</select>
					<select name="torart<?php echo $j;?>">
							<?php
							$sql="SELECT * FROM torart";
							$result =mysqli_query($con,$sql);?>
						<option value="0"></option>
							<?php
							while($row = mysqli_fetch_array($result)){?>
								<option value="<?php echo $row['0'] ?>"><?php echo $row['1']?></option>';
							<?php } ?>
					</select>
					<?php
					$counter++;
					$j++;
				}
				if ($endergebnis != 0) {?>
					<hr><button class="btn btn-primary" type="submit"/>Speichern</button>
				<?php } ?>

				<input type="hidden" name="spiele_id" value="<?php echo $_GET['id']; ?>" />
				<input type="hidden" name="ergebnis" value="<?php echo $endergebnis; ?>" />
			</div>
		</form>
	<?php
	}
}


if ($u == 2){ ?>
	<script type="text/javascript">
		//alert("Anzahl der Tore stimmt nicht mit dem Ergebnis überein!");
	</script>
	<?php 	
}?>
</div>