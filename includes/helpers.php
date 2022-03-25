<?php

function showErrors($errors, $field) {                      
    $alert = ''; 
    if(isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert alert-error'>".$errors[$field].'</div>'; 
    }
    
    return $alert; 
}

function deleteErrors() {
    $erased = false; 

    if(isset( $_SESSION['errors'])) {
        $_SESSION['errors'] = null; 
        $erased = session_unset();
    }

    if(isset( $_SESSION['inserted'])) {
        $_SESSION['inserted'] = null; 
        session_unset();
    }

    return $erased; 
}

function getCategories($connection) {
    $result = array(); 
     $sql = "SELECT * FROM categories ORDER BY Id ASC;"; 
     $categories = mysqli_query($connection, $sql); 
    
     if($categories && mysqli_num_rows($categories) >= 1) {
         $result = $categories; 
     }
     return $result;  
 }

 function getLastPosts($connection) {
    $result = array(); 
    $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
            INNER JOIN categories c ON p.CategoryId = c.Id
            ORDER BY p.Id DESC LIMIT 4;"; 
    $lastPosts = mysqli_query($connection, $sql); 
        if($lastPosts && mysqli_num_rows($lastPosts) >= 1) {
            $result = $lastPosts; 
        }
        return $result; 
 }
?>

<!-- function deleteErrors() {
    $_SESSION['errors'] = null; 
    $erased = session_unset($_SESSION['errors']);
    
    if(isset($_SESSION['inserted'])){
        $_SESSION['inserted'] = null; 
        session_unset($_SESSION['inserted']);
    }

    return $erased; 

} -->