<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "data";

    $koneksi = MySQLi_connect($host,$user, $password, $database);

    // Check connection
    if(MySQLi_connect_errno()){
        echo "Failed to connect to MySQL: ". MySQLi_connect_error();
        exit();
    }
?>