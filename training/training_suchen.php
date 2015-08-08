
<div id="training_suchen">
<h2>Training suchen</h2>
<form action="training_suchen.php?status=suchen" method="POST">
	Nach Monat: 	
	<select name="Monat">
		<option value="0"> - </option>
	<?php
	$sql = "SELECT monat.Monat FROM monat";
		$result = mysql_query($sql);

		$counter = 1;			
		while($row = mysql_fetch_array($result))
		{
		echo "<option value=".$counter.">".$row['Monat']."</option>";
		$counter++;
		}
	?>
	</select>
	<br>

	Nach Spieler: <input type="text" name="training_spieler"><br>
	Nach &Uuml;bungen: <input type="text" name="training_uebungen"><br>
	<input class="bearbeiten_button" type="submit" value="Suchen" name="suchen">
</form>

</div> <!-- End of #training_suchen -->

<div id="training_suchen_ergebnis">
	<?php
		if($_GET['status']=='suchen')
		include('./training/suchen.php')
	?>
</div> <!-- End of #training_suchen_ergebnis -->
