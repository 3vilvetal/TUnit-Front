<?php
	$table = $_GET['table'];
	$date = $_GET['date'];
	$column = $_GET['column'];
	require_once "dbconnect.php"; 
	$query = "UPDATE ".$table." SET ".$column."=-1 WHERE date='".$date."';";
	$qr_result = mysql_query($query);
	//or die(mysql_error());
	mysql_close($connect_to_db);
?>