<?php
    // data
    $db_host = '192.168.12.27';
    $db_name = 'test_results';
    $db_username = 'root';
    $db_password = '111';

    // connect to server
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
		or die("Could not connect: " . mysql_error());

    // connect to db
    mysql_select_db($db_name, $connect_to_db)
		or die("Could not select DB: " . mysql_error());
?>