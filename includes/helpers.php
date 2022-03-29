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
        $erased = true; 
    }

    if(isset( $_SESSION['input_errors'])) {
        $_SESSION['input_errors'] = null; 
        $erased = true; 
    }

    if(isset( $_SESSION['inserted'])) {
        $_SESSION['inserted'] = null; 
        $erased = true; 
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

//  function getLastPosts($connection) {
//     $result = array(); 
//     $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
//             INNER JOIN categories c ON p.CategoryId = c.Id
//             ORDER BY p.Id DESC LIMIT 4;"; 
//     $lastPosts = mysqli_query($connection, $sql); 
//         if($lastPosts && mysqli_num_rows($lastPosts) >= 1) {
//             $result = $lastPosts; 
//         }
//         return $result; 
//  } Parametritzada a sota. 

function getCategory($connection, $id) {    
    $result = array(); 
    $sql = "SELECT * FROM categories WHERE Id = $id;"; 
    $category = mysqli_query($connection, $sql); 
    
     if($category && mysqli_num_rows($category) >= 1) {
         $result = mysqli_fetch_assoc($category); 
     }
     return $result;  
 }

 function getPost($connection, $id) {    
    $result = array(); 
    $sql = "SELECT p.*, c.Name AS 'Category', CONCAT(u.Name, ' ', u.LastName) AS 'User' FROM posts p
    INNER JOIN categories c ON p.CategoryId = c.Id
    INNER JOIN users u ON p.UserId = u.Id
    WHERE p.Id = $id;"; 

    $post = mysqli_query($connection, $sql); 
    
     if($post && mysqli_num_rows($post) >= 1) {
         $result = mysqli_fetch_assoc($post); 
     }
     return $result;    
 }

 function getPosts($connection, $search, $limit = null, $category = null) {
    $result = array(); 
    $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
            INNER JOIN categories c ON p.CategoryId = c.Id
            ORDER BY p.Id DESC;"; 

    if(!empty($category)) {

        $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
        INNER JOIN categories c ON p.CategoryId = c.Id
        WHERE p.CategoryId = $category ORDER BY p.Id DESC;"; 
    }

    if(!empty($search)) {

        $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
        INNER JOIN categories c ON p.CategoryId = c.Id
        WHERE p.Title LIKE '%$search%';"; 
    }

    if($limit) {
        //$sql = $sql."LIMIT 4;"; 
        // $sql .= "LIMIT 4;"; 
        $sql = "SELECT p.*, c.Name AS 'Category' FROM posts p 
            INNER JOIN categories c ON p.CategoryId = c.Id
            ORDER BY p.Id DESC LIMIT 4;"; 
    }
    

    $posts = mysqli_query($connection, $sql); 
        if($posts && mysqli_num_rows($posts) >= 1) {
            $result = $posts; 
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

<!-- function getAdmin($connection) {
    $result = array(); 
    $sql = "SELECT * FROM users WHERE Id=1;"; 
    $adminEmail = mysqli_query($connection, $sql); 
    if($adminEmail && mysqli_num_rows($adminEmail) >= 1) {
        $result = $adminEmail; 
    }
    return $result;  
 } -->