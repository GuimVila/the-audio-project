
<?php
require_once 'includes/connection.php'; 

if($_SESSION['user'] && isset($_GET['id'])) {


    $postId = $_GET['id']; 
    $userId =  $_SESSION['user']['Id']; 
    $sql = "DELETE FROM posts WHERE UserId = $userId AND Id = $postId;"; 
    $deletePost = mysqli_query($db, $sql); 
  
    header('Location: index.php'); 
}