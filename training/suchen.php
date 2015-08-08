<?php

echo "<pre>";
print_r($_POST);
echo "<pre>";

$monat = $_POST["Monat"];
$spieler = htmlentities($_POST["training_spieler"]);
$uebungen = htmlentities($_POST["training_uebungen"]);
$datum = mktime(0,0,0,$monat,1,date('Y'));
echo $monat." :monat";
echo "<br>";
echo $spieler." :spieler";
echo "<br>";
echo $uebungen." :uebungen";
echo "<br>";
//echo $datum." :datum";
//echo date(r,$datum);
echo "<br>";

$result = mysql_query("SELECT datum from training");
$i = 0;
while($row = mysql_fetch_array($result)){
	$blah = $row['0'];
	echo date("m",$blah);
	echo "<br />";
	$i++;
}


$sql = "SELECT * from training ";

if($monat != 0) 
{
	$where = " WHERE datum = '$datum'";
}
if ($spieler != null && $spieler != '')
{
	if (!isset($where))
	{
		$where = " WHERE spieler LIKE '%$spieler%'";
	}
	else
	{
		$where .= " AND spieler = '$spieler'";
	}
}
if ($uebungen != null && $uebungen != '')
{
	if (!isset($where)) 
	{
		$where = " WHERE uebungen LIKE '%$uebungen,%'";
	}
	else
	{
		$where .= " AND uebungen LIKE '%$uebungen,%'";
	}
}

if (isset($where))
{
	$sql .= $where;
}

echo $sql;
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

while($row = mysql_fetch_array($result))
	{
	echo "<pre>";
	print_r($row);
	echo "<pre>";
	echo "<br />";
	}

?>