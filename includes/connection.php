
<?php

//Connecting to the Database

$server = "localhost"; //IP remote server
$username = "root"; 
$password = "root";
$database = "audio_project";  
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Session start

if(!isset($_SESSION)){
    session_start(); 
}
?>