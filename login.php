
<?php

// Session start and connection to the database
require_once 'includes/connection.php';

// Get files from the form

if(isset($_POST)) {
    
    //Delete old error if prior invalid user
    if(isset($_SESSION['error_login'])) {
        session_unset(); 
    }

    // Get data from form
    $email = trim($_POST['email']); 
    $password = $_POST['password']; 

    
    //Check database for coincidences

    $sql = "SELECT * FROM users WHERE email = '$email'"; 
    $query = mysqli_query($db, $sql); 

    if($query && mysqli_num_rows($query) == 1){
        $user = mysqli_fetch_assoc($query); 

        
        //Check Password and Encryption
        $verify = password_verify($password, $user['Password']); 
        if($verify) {
            // Use session to save user's data once loged in
            $_SESSION['user'] = $user; 

        } else {
            // If any issues, send a session error
            $_SESSION['error_login'] = "Invalid user"; 
        }

    } else {
        //error message
        $_SESSION['error_login'] = "Invalid user"; 
    }
}

// Redirect to index.php

header('Location: index.php'); 

?>