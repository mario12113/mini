<?php
    //list variables
    $db["db_host"] = "localhost";
    $db["db_user"] = "root";
    $db["db_pass"] = "";
    $db["db_name"] = "minisdb";

    foreach($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    //set db connection
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //check db connection
    if(!$connection) {
        die("db connection failed: ") . $connection->connect_error;
    } 
?>