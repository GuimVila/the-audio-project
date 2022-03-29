<?php
   
//Validate user's data

if(isset($_POST)) {
    // Session start and connection to the database
    require_once 'includes/connection.php';

    $title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false; 
    $getDescription = isset($_POST['description']) ? mysqli_real_escape_string($db, ($_POST['description'])) : false; 
    $description = str_replace(" ", "", $getDescription);    
    $category = isset($_POST['category']) ? intVal($_POST['category']) : false; 
    $user = $_SESSION['user']['Id']; 
    $errors = array();  

  

    if(empty($title)) {
        $errors['title'] = "Title is empty";  
    }

    if(empty($description)) {
        $errors['description'] = "Description is empty";  
        $description = null; 
    }

    if(empty($category) && !isnumeric($category)) {
        $errors['category'] = "Invalid Category";  
    } 

    

    if(count($errors) == 0) {
        if(isset($_GET['edit'])) {
            $postId = $_GET['edit']; 
            $userId = $_SESSION['user']['Id']; 
        
            $sql = "UPDATE posts SET Title = '$title', Description = '$description', CategoryId = '$category'
            WHERE Id = $postId and UserId = $userId;"; 
        } else {
            $sql = "INSERT INTO posts VALUES(NULL, '$user', '$category', '$title', '$description', CURDATE());"; 
        } 
        
        $savePost = mysqli_query($db, $sql); 
        header('Location: index.php'); 
    
    } else {
        $_SESSION["input_errors"] = $errors; 

        if(isset($_GET['edit'])) {

            header("Location: edit_post.php?id=" . $_GET['edit']); 
        } else { 
            header('Location: new_post.php'); 
        } 
    }
}


?>