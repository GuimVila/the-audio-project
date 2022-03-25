
<?php

const MIN_VALUE = 0; 

if(isset($_POST)) {

    require_once 'includes/connection.php';
   

    //Save user's data

    $username = isset($_POST['username']) ? mysqli_real_escape_string($db, $_POST['username']) : false; 
    $name = isset($_POST['name']) ?  mysqli_real_escape_string($db, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ?  mysqli_real_escape_string($db, $_POST['lastname']) : false;
    $country = isset($_POST['country']) ?  mysqli_real_escape_string($db, $_POST['country']) : false;
    $city = isset($_POST['city']) ?  mysqli_real_escape_string($db, $_POST['city']) : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ?  mysqli_real_escape_string($db, $_POST['password']) : false;

    // Error array

    $errors = array(); 
    
    //Validate user's data
                                       

    if(!empty($username) && preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/', $username)) {
        $validateUser = true; 
    } else {
        $validateUser = false; 
        $errors['username'] = "Invalid username";  
    }

    if(!empty($name) && !is_numeric($name) && preg_match("/^([a-zA-Z' ]+)$/", $name)) {
        $validateName = true; 
    } else {
        $validateName = false; 
        $errors['name'] = "Your name must contain only letters";  
    }

    if(!empty($lastname) && !is_numeric($lastname) && preg_match("/^([a-zA-Z' ]+)$/", $lastname)) {
        $validateLast = true; 
    } else {
        $validateLast = false; 
        $errors['lastname'] = "Your last name must contain only letters";  
    }

    if(!empty($country) && !is_numeric($country) && preg_match("/^([a-zA-Z' ]+)$/", $country)) {
        $validateCountry = true; 
    } else {
        $validateCountry = false; 
        $errors['country'] = "Invalid country";  
    }

    if(!empty($city) && !is_numeric($city) && preg_match("/^([a-zA-Z' ]+)$/", $city)) {
        $validateCity = true; 
    } else {
        $validateCity = false; 
        $errors['city'] = "Invalid city";  
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validateEmail = true; 
    } else {
        $validateEmail = false; 
        $errors['email'] = "Invalid email";  
    }

    if(!empty($password)) {
        $validatePass = true; 
    } else {
        $validatePass = false; 
        $errors['password'] = "Invalid Password";  
    }

    //Insert user into de Database

    if (count($errors) == MIN_VALUE) {
        $registration = true; 
        //Password Encryption
        $encripted = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]); //4 passades de xifrat 
        $sql = "INSERT INTO users VAlUES (null, '$username', '$name', '$lastname', '$email', '$encripted', '$country', '$city', NOW())"; 
        $query = mysqli_query($db, $sql); 

        if($query) {
            $_SESSION['inserted'] = 'Registration completed'; 
        } else {
            $_SESSION['errors']['general'] = 'User registration failed';
        }

    } else {
        $_SESSION['errors'] = $errors; 
    }
}

header('Location: index.php'); 


?>

ALTER TABLE users DROP COLUMN Birth;
