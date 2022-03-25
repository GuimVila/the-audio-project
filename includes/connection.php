
<?php

//Connecting to the Database

$server = "localhost"; //IP remote server
$username = "root"; 
$password = "root";
$database = "audio_project";  
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Session start

session_start(); 

?>