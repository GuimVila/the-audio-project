
<?php require_once 'connection.php'; ?>
<?php require_once 'helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <title>The Audio Project</title>
</head>
<body>

    <!-- Header -->
    <header id="header">
        <!-- Logo -->
        <div id="logo">
            <a href="index.php">
                The Audio Project
            </a>
        </div>    
    <!-- Nav -->  
    <nav id="nav">
        <ul>
            <li>
                <a href="index.php">Home</a>   
            </li>
            
            <?php $categories = getCategories($db); 
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)):
            ?>
                        <li>
                            <a href="category.php?id=<?=$category['Id']?>"><?=$category['Name']?></a>    
                        </li>
            <?php 
                    endwhile; 
                endif; 
            ?>

            <li>
                <a href="index.php">Contact</a>  
            </li>
        </ul>
    </nav>
    <div class="clearfix"></div>
    </header>
    
    <div id="container"> 