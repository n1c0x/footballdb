<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="../design/design.css">
	
	<title>Fussball &Uuml;bungen</title>
</head>

<body>

<a href="#" class="popup"> Maus
<span><br>
<img src="../upload/default.png" />
</span>
</a>

<div id="container">
	<a id="hide" href="#show" class="button">Verstecken</a><a id="show" href="#container" class="button">Anzeigen</a>
	<p id="content"><img src="../upload/default.png" /></p>
</div>


<?php

include('../connect.php');

function write_content($i)
{
	$target_path = "../upload/". $_GET['id']. ".jpg";
	

	$filename = "$target_path";


if(file_exists($filename))
	{
	echo "
	<a href=\"#bild2\"><img src=\"../upload/".$_GET['id'].".jpg\" /></a>
	<div class=\"lightbox\" id=\"bild2\">
	
	<a href=\"#\"> <img src=\"../upload/".$_GET['id'].".jpg\" /> </a>
	
	
	</div>";
	}
	else 
	{
	echo "
	<a href=\"#bild2\"><img src=\"../upload/default.png\" /></a>
	<div class=\"lightbox\" id=\"bild2\">
	
	<a href=\"#\"><img src=\"../upload/default.png\" /></a>
	
	
	</div>";
}
$sql=mysql_query("SELECT * FROM uebungen 
						LEFT JOIN gruppierung 
						ON uebungen.gruppierung = gruppierung.ID
						LEFT JOIN athletik
						ON uebungen.athletik = athletik.ID
						LEFT JOIN kondition
						ON uebungen.kondition = kondition.ID
						LEFT JOIN koordination
						ON uebungen.koordination = koordination.ID
						LEFT JOIN technik
						ON uebungen.technik = technik.ID
						LEFT JOIN taktik
						ON uebungen.taktik = taktik.ID
						WHERE uebungen.ID=$i");

	
	while ($res = mysql_fetch_array($sql))
		{
			echo "
			<p><label>Datum:</label> ".date("d.m.Y", $res[2])."</p>
			<p><label>Author:</label> ".$res[7]."</p>
			<p><label>Titel der &Uuml;bung:</label> ".$res[1]."</p>
			<p><label>Gruppierung:</label> ".$res[15]. "</p>
			<p><label>Athletik:</label> ".$res[17]. "</p>
			<p><label>Kondition:</label> ".$res[19]. "</p>
			<p><label>Koordination:</label> ".$res[21]. "</p>
			<p><label>Technik:</label> ".$res[23]. "</p>
			<p><label>Taktik:</label> ".$res[25]. "</p>
			<p><label>Dauer:</label> ".$res[6]." Minute(n)</p>
			<p class='long'><label>Organisation:</label><br>".$res[3]."</p>
			<p class='long'><label>Durchf&uuml;hrung:</label><br>".$res[4]."</p>
			<p class='long'><label>Hinweis:</label><br>".$res[5]."</p>";
		}

}
?>
<div class="content">

<?php echo write_content($_GET['id']); ?><br>
	
<a href='../functions/aendern.php?id=<?php echo $_GET['id'];?>'>&Auml;ndern</a>

</p>
</div>
<div id="zurueck">
<input type="button" name="zurück" value="Zurück" onclick="window.close();" />
</div>

</body>
</html>
