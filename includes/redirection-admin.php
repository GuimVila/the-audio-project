<?php


if(!isset($_SESSION['user'])) {
    header('Location:index.php'); 
}

if($_SESSION['user']['Email'] !== "guillem.vtorrent@gmail.com"){
    header('Location:index.php'); 
}

?>
