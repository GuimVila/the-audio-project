<?php

$errors = array(); 
    
//Validate user's data

if(isset($_POST)) {
    // Session start and connection to the database
    require_once 'includes/connection.php';
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false; 
    if(!empty($name) && !is_numeric($name) && preg_match("/^([a-zA-Z' ]+)$/", $name)) {
        $validateName = true; 
    } else {
        $validateName = false; 
        $errors['name'] = "Your name must contain only letters";  
    }

    if(count($errors) == 0) {
        $sql = "INSERT INTO categories VALUES(NULL, '$name')"; 
        $saveCategory = mysqli_query($db, $sql); 
    }
}

header('Location: index.php');  

?>