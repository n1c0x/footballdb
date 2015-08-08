<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="refresh" content="0; URL=spiel_aufstellung.php?id=<?php echo $_GET['id']; ?>">
</head>
<body>
<?php
include("../connect.php");
$length = sizeof($_POST)-$_POST["spieler_anzahl"]-1;
$string_long = "";
$value=0;
$i=0;
foreach($_POST as $x=>$x_value){
	if($x_value=="||"){
		break;
	}
	$i++;
	if(is_numeric($x_value)){
		$string_long .= $x_value.",";
	}
	else{
		$string_long .= $value.",";
	}
}
$string_short = substr($string_long,0,strlen($string_long)-1);
echo $string_short." ";

$sql = "UPDATE spiele SET aufstellung='".$string_short."' WHERE ID=".$_GET['id']."";
echo $sql;
mysql_query($sql);
?>
</body>
</html>