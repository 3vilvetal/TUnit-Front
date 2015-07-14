<?php

	$table = $_GET['table'];
	$date = $_GET['date'];

	$string = file_get_contents("../config.js");
	$json_a = json_decode($string, true);

	$fileColumns= $json_a[$table][fileColumns];
	$fileColumnsLength=count($fileColumns);

	$tinyintColumns= $json_a[$table][tinyintColumns];
	$tinyintColumnsLength=count($tinyintColumns);

	$varcharColumns= $json_a[$table][varcharColumns];
	$varcharColumnsLength=count($varcharColumns);

	$html_data = '<table  class="table table-bordered"><thead><tr><th>#</th>';

	for($q=0;$q<$varcharColumnsLength;$q++){
		$html_data.= '<th>'.$varcharColumns[$q].'</th>';        	
	}
	
	for($i=0;$i<$tinyintColumnsLength;$i++){
		$html_data.= '<th>'.$tinyintColumns[$i].'</th>';
	}

	for($i=0;$i<$fileColumnsLength;$i++){
		$html_data.= '<th>'.$fileColumns[$i].'</th>';
	}

	$html_data .= '<th>date</th></tr></thead><tbody>';

	require_once "dbconnect.php"; 
	$qr_result = mysql_query("SELECT * FROM ".$table." WHERE date LIKE '%".$date."%';");
	//or die(mysql_error());
	//or die(mysql_error());

	$j=1;
	while($data = mysql_fetch_array($qr_result)){
		$html_data.= '<tr>';
		$html_data.= '<td>'.$j.'</td>';  

		// add varchar Columns
		for($q=0;$q<$varcharColumnsLength;$q++){
			$html_data.= '<td>'.$data[$varcharColumns[$q]].'</td>';        	
		}
		
		// add tinyint Columns
		for($q=0;$q<$tinyintColumnsLength;$q++){
			switch ($data[$tinyintColumns[$q]]) {
				case -1:       $html_data.= '<td >skip</td>';        			break;
				case 1:        $html_data.= '<td BGCOLOR="90EE90">true</td>';        	break;
				case null:     $html_data.= '<td BGCOLOR="F4C11F">null <button onclick="skip(this)" table="'.$table.'" date="'.$data['date'].'" column="'.$tinyintColumns[$q].'" class="btn btn-danger square-btn-adjust" style="padding-top: 0px; padding-bottom: 0px;">skip</button> </td>';        break;
				case 0:        $html_data.= '<td BGCOLOR="eb1616">false <button onclick="skip(this)" table="'.$table.'" date="'.$data['date'].'" column="'.$tinyintColumns[$q].'" class="btn btn-danger square-btn-adjust" style="padding-top: 0px; padding-bottom: 0px;">skip</button> </td>';       break;
			}
		}
		
		// add file Columns
		for($i=0;$i<$fileColumnsLength;$i++){
			$html_data.= '<td align="center"><a href="' .  $data[$fileColumns[$i]] . '" target="_blank">'.$fileColumns[$i].'</a></td>';
		}

		$html_data.= '<td>' . $data['date'] . '</td>';
		$html_data.= '</tr>';
		$j++;
	}

	$html_data .= '</tbody></table>';
	mysql_close($connect_to_db);

	if(mysql_num_rows($qr_result)== 0){
   		$html_data = '<h5>No data in db :( </h5><img src="files/o85Y4qV.gif" style="-webkit-user-select: none">';
	}

	echo $html_data;

?>