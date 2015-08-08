
<html>
	<head>
		
		<script type="text/javascript" src="../scripts/redips-drag-min.js"></script>
		<script type="text/javascript" src="../scripts/script.js"></script>
	</head>	
	<body onload="REDIPS.drag.init()">
		<center>
			<form action="aufstellung_formular.php?id=<?php echo $_GET['id']; ?>" method="POST">
			<!-- tables inside this DIV could contain drag-able content  -->
			<div id="drag">
				
				<!-- left container -->
				<div id="player_target">
					<div id="field_green">
						<div id="center_circle" class="stripes"></div>
						<div id="goal">
							<div id="sixteen_circle" class="stripes"></div>
							<div id="sixteen" class="stripes"></div> 
							<div id="sixteen_point" class="stripes"></div>
							<div id="five" class="stripes"></div> 				
						</div>
					</div>
					<table id="table1">
						
						<tbody>
							<?php
							$letter = array();
							for($i=97;$i<=122;$i++){
								$letter_vertical[] = chr($i);
								$letter_horizontal[] = chr($i);
							}
							for($j=0;$j<=10;$j++){
								echo "<tr>";
								for($i=0;$i<=8;$i++){
								echo "
								<td>
									<input value=".$letter_vertical[$i].$letter_horizontal[$j]." name='field_sector".$letter_vertical[$i].$letter_horizontal[$j]."".$letter_vertical[$i].$letter_horizontal[$j]."' type='hidden' />
								</td>";
								}
								echo "</tr>";
								
							}
							?>
						</tbody>
					</table>
				</div><!-- left container -->
				<?php
				//print_r($field_sector);
				?>
				<input type="hidden" name="separator" value="||"/>
				<!-- right container -->
				<div id="player_list">
					<table id="table2">
						<colgroup>
							<col width="120"/>
						</colgroup>
						<tbody>
							<!-- clone 2 elements + last element -->
							<?php
							$sql = "SELECT spieler.SID,spieler.vorname,spieler.name FROM spieler";
							$result = mysql_query($sql);
							
							$counter = 0;
							while($row = mysql_fetch_array($result))
							{
								$sid = $row['SID'];
								echo "
								<tr>
									<td class=\"mark\">
										<div id=".$sid." class=\"drag\">".$row['vorname'] . " " . $row['name']."
										<input value=".$sid." name='player".$sid."' type='hidden' />
										</div>
									</td>
								</tr>";
								$counter++;
							}
							?>
						</tbody>
					</table>
				</div><!-- right container -->
			</div><!-- drag container -->
			<input type="hidden" name="spieler_anzahl" value="<?php echo $counter; ?>" /> 
			<input type="submit" class="bearbeiten_button"/>
		</form>
		</center>