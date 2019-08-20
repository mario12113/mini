<?php
    // What's the address of your database?
    $database_host = 'localhost';

    // What's the username to connect?
    $database_user = 'root';

    // What's the password for that user?
    $database_password = '';

    // What's the name of the database?
    $database = 'minisdb';

    // connect to database
    $connection = mysqli_connect($database_host, $database_user, $database_password, $database);
    //check db connection
    if(!$connection) {
        die("db connection failed: ") . $connection->connect_error;
    } 
?>