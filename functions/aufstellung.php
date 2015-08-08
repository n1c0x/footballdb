<?php 
if($_GET['cat'] == 'auf'){

?>
<div class="row">
	<div class="span12">
		<a href="/index.php?page=6&art=spiele&cat=auf_aen&id=<?php echo $_GET['id'];?>">
		Aufstellung eintragen/&auml;ndern<br>
		</a>
	</div> <!-- End of span12 -->
</div> <!-- End of row -->
<?php


$spieler = array();
$position = array();
$aufstellung = htmlentities(array_shift($_POST));
$id = htmlentities(array_shift($_POST));


foreach ($_POST as $key => $value) {
	$position[] = array_shift($_POST);
	$spieler[] = array_shift($_POST);
}

for($i=0;$i<=10;$i++){
	array_pop($position);
	array_pop($spieler);
}



/* Speichern der Aufstellung in der Datenbank */
$sql2 = "DELETE FROM ktab_id_spiel_id_spieler_position WHERE id_spiel=".$id."";
mysqli_query($con, $sql2);
for($i=0;$i<count($position);$i++){
	$sql = "SELECT aufstellung_position.id FROM aufstellung_position WHERE position='".$position[$i]."'";
	$sql_aufstellung = mysqli_query($con,$sql);
	$result = mysqli_fetch_row($sql_aufstellung);
	// echo "id: ".$id."<br>position: ".$position[$i]."<br>spieler: ".$spieler[$i]."<br><br>";
	
	$sql3 = "INSERT INTO ktab_id_spiel_id_spieler_position (id_spiel,id_spieler,position) VALUES ('".$id."','".$spieler[$i]."','".$result[0]."')";
	mysqli_query($con,$sql3);
	$sql4 = "UPDATE spiele SET aufstellung=".$aufstellung." WHERE ID=".$id;
	mysqli_query($con,$sql4);
}

?>
	<table class="table table-bordered green">
		<?php
		$spieler = "SELECT 	ktab_id_spiel_id_spieler_position.id_spieler AS spieler,
							ktab_id_spiel_id_spieler_position.position AS position,
							aufstellung_position.position AS aufstellung_position,
							spieler.vorname AS vorname,
							spieler.name AS nachname,
							spiele.ID
							FROM ktab_id_spiel_id_spieler_position
							JOIN spiele
							ON ktab_id_spiel_id_spieler_position.id_spiel=spiele.ID
							JOIN spieler
							ON ktab_id_spiel_id_spieler_position.id_spieler=spieler.SID
							JOIN aufstellung_position
							ON ktab_id_spiel_id_spieler_position.position=aufstellung_position.id
							WHERE spiele.ID=".$_GET['id']."";

		
		
		for($i=97;$i<=104;$i++){
				echo "<tr>";
					for($j=1;$j<=5;$j++){
						echo "<td id=".chr($i).$j." >";
						$query_spieler = mysqli_query($con,$spieler);
						while ($result_spieler = mysqli_fetch_row($query_spieler)) {
							/*echo '<pre>';
							print_r($result_spieler);
							echo '</pre>';*/
							if($result_spieler[2]==chr($i).$j){?>
								<button class="btn btn-success"><?php echo $result_spieler[3]." ".$result_spieler[4];?></button>
							<?php }
						}
						echo "</td>";
					}
				echo "</tr>";
		}
			?>
	</table> <!-- End of "aufstellung" -->
</form>	
<?php

}



elseif($_GET['cat'] == 'auf_aen') {

$query_aufstellung = mysqli_query($con,"SELECT 
										aufstellung.id,
										aufstellung.aufstellung, 
										aufstellung_position.position, 
										sp.sp 
										FROM ktab_aufstellung_position_sp
										JOIN aufstellung
										ON ktab_aufstellung_position_sp.id_aufstellung = aufstellung.id
										JOIN aufstellung_position
										ON ktab_aufstellung_position_sp.id_position = aufstellung_position.id
										JOIN sp
										ON ktab_aufstellung_position_sp.id_sp = sp.id
										");
$aufstellung = array();
while($result_aufstellung = mysqli_fetch_row($query_aufstellung)){
	$aufstellung[] = $result_aufstellung;

}
/*echo '<pre>';
print_r($aufstellung);
echo'</pre>';*/

?>
<div class="row">
	<div class="span3"><div id="test"></div>
		Aufstellung ausw&auml;hlen:<br>
		<form name="aufstellung" action="/index.php?page=6&art=spiele&cat=auf&id=<?php echo $_GET['id'];?>" method="post">
			<select id="select" name="aufstellung" onchange='changeBgColor(<?php echo json_encode($aufstellung)?>,2);'>
				<option value='0'></option>
				<?php
					
					$counter = "";
					$query_anzeige_aufstellung = mysqli_query($con, "SELECT * FROM aufstellung");
					while($result_anzeige_aufstellung = mysqli_fetch_array($query_anzeige_aufstellung)){?>
						<option value=<?php echo $result_anzeige_aufstellung[0]; ?> 
							><?php echo $result_anzeige_aufstellung[1]; ?></option>
						<?php 
						$counter++;
					}?>
			</select>
	</div> <!-- End of span3 -->
	<div class="span3"><br>
		<button class="btn btn-primary" type="submit">Speichern</button>
	</div> <!-- End of span3 -->
</div> <!-- End of row -->


	<table class="table table-bordered green">
			<input type="hidden" name="id_spiel" value="<?php echo $_GET['id'] ?>">
			<?php
				$query_anzeige_spieler = mysqli_query($con,"SELECT spieler.SID, spieler.name, spieler.vorname FROM spieler");
				$anzeige_spieler = array();
				$id_spieler = array();
				while ($result_anzeige_spieler=mysqli_fetch_row($query_anzeige_spieler)){
					$anzeige_spieler[] = $result_anzeige_spieler[2].' '.$result_anzeige_spieler[1];
					$id_spieler[] = $result_anzeige_spieler[0];
				}
				for($i=97;$i<=104;$i++){
					echo "<tr>";
						for($j=1;$j<=5;$j++){
							echo '<td id="'.chr($i).$j.'"  >';
							echo '<input type="hidden" >';
								echo '<select class="input-medium '.chr($i).$j.'" style="visibility:hidden;">';
								foreach ($anzeige_spieler as $key => $value) {
									echo '<option value="'.$id_spieler[$key].'">'.$value.'</option>';
								}
								echo "</select>";
							echo "</td>";
						}
					echo "</tr>";
				}
			?>
	</table> <!-- End of "aufstellung" -->
</form>	
<?php }
?>