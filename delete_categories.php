<?php

$errors = array(); 
    
//Validate user's data

if(isset($_POST)) {
    // Session start and connection to the database
    require_once 'includes/connection.php';
    $name = isset($_POST['category']) ? mysqli_real_escape_string($db, $_POST['category']) : false; 
    if(!empty($name) && !is_numeric($name) && preg_match("/^([a-zA-Z' ]+)$/", $name)) {
        $validateName = true; 
    } else {
        $validateName = false; 
        $errors['name'] = "Your name must contain only letters";  
    }
}

    if(count($errors) == 0) {
        $sql = "DELETE FROM categories WHERE name = '$name'"; 
        $deleteCategory = mysqli_query($db, $sql);    
}

header('Location: index.php');  

?>