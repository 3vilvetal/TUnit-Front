<?php
	require_once "dbconnect.php"; 
				
	$date = $_GET['date'];
	$string = file_get_contents("../config.js");
	$json_a=json_decode($string,true);
	foreach ($json_a as $key => $value){

		$bugs = 0;
		$warning = 0;
		$ok = 0;
		$table= $value[table];
		$tinyintColumns = $value[tinyintColumns];
		$tinyintColumnsLength = count($tinyintColumns);
					
		$qr_result = mysql_query("SELECT * FROM ".$table." WHERE date LIKE '%".$date."%';");
					
		while($data = mysql_fetch_array($qr_result)){		
			for($i=0;$i<$tinyintColumnsLength;$i++){
				switch ($data[$tinyintColumns[$i]]) {
					case null:     $warning++;  break;
					case 0:        $bugs++;  	break;
					case 1:        $ok++;  	break;
				}
			}
		}

		if($bugs>0 && $warning==0){
			echo  '<li><a onclick="menu(this)" table="'.$value[table].'" href="#"> '.$value[name].' <img src="files/bug-r.png" style="width: 15px; height: 15px;"> '.$bugs.' </a></li>';
		}else 
		if($bugs==0 && $warning>0){
			echo  '<li><a onclick="menu(this)" table="'.$value[table].'" href="#"> '.$value[name].' <img src="files/bug-y.png" style="width: 15px; height: 15px;"> '.$warning.' </a></li>';
		}else
		if($bugs>0 && $warning>0){
			echo  '<li><a onclick="menu(this)" table="'.$value[table].'" href="#"> '.$value[name].' <img src="files/bug-r.png" style="width: 15px; height: 15px;"> '.$bugs.' <img src="files/bug-y.png" style="width: 15px; height: 15px;"> '.$warning.' </a></li>';
		}else
		if($ok==0){
			echo  '<li><a onclick="menu(this)" table="'.$value[table].'" href="#"> '.$value[name].' no data</a></li>';
		}else{
			echo  '<li><a onclick="menu(this)" table="'.$value[table].'" href="#"> '.$value[name].'</a></li>';
		}

	}

	mysql_close($connect_to_db);
?>