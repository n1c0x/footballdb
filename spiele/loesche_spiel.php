<html><head>
<?php

echo '<meta http-equiv="refresh" content="0; URL=uebersicht_spiele.php"></head><body>';
include ('../connect.php');

	$sql = "DELETE FROM fussball_uebungen.spiele WHERE ID=".$_GET['id'].";";
	mysql_query($sql);
?>
<script type="text/javascript">	alert("Eintrag wurde gelöscht");</script>
</body>
</html>
