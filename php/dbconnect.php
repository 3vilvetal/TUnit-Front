<?php
    // data
    $db_host = '127.0.0.1';
    $db_name = 'test_results';
    $db_username = 'root';
    $db_password = 'ivanchik';

    // connect to server
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
		or die("Could not connect: " . mysql_error());

    // connect to db
    mysql_select_db($db_name, $connect_to_db)
		or die("Could not select DB: " . mysql_error());
?>