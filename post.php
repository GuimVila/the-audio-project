
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $newPost = getPost($db, $_GET['id']); 
  
    if(!isset($newPost['Id'])) {
        header('Location: index.php');  
    }
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

        <!-- MAIN -->
    <main id="main">   
       
        <h1><?=$newPost['Title']?></h1>
        <a href="category.php?id=<?=$newPost['CategoryId']?>">
            <h2><?=$newPost['Category']?></h2>
        </a>
        <h4><?=$newPost['CreationDate']?> | <?=$newPost['User']?></h4>
        <p>
            <?=$newPost['Description']?>
        </p>

        <?php  if(isset($_SESSION['user']) && $_SESSION['user']['Id'] == $newPost['UserId']): ?>
            <a href="edit_post.php?id=<?=$newPost['Id']?>" class="button button-post" role="button">Edit</a>
            <a href="delete_post.php?id=<?=$newPost['Id']?>" class="button button-close" role="button">Delete</a>
        <?php endif; ?>

        </main>

<?php require_once 'includes/footer.php'; ?>  