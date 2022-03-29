
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $newCategory = getCategory($db, $_GET['id']); 
    if(!isset($newCategory['Id'])) {
        header('Location: index.php');  
    }
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

        <!-- MAIN -->
    <main id="main">   
       
        <h1><?=$newCategory['Name']?> Posts</h1>

        <?php $categoryPosts = getPosts($db, null, null, $_GET['id']); 
         
        if(!empty($categoryPosts) && mysqli_num_rows($categoryPosts) >= 1): 
            while($categoryPost = mysqli_fetch_assoc($categoryPosts)):  

              
        ?>
        
        <article class="post">
            <a href="post.php?id=<?=$categoryPost['Id']?>">
                <h2><?=$categoryPost['Title']?></h2>
                <span class="post-date"><?=$categoryPost['Category'].' | '.$categoryPost['CreationDate'] ?></span>
                <p><?=substr($categoryPost['Description'], 0, 466)."..."?></p>
            </a>
        </article>
        <?php   
            endwhile; 
        else:    
        ?>
            <div class="alert-error">No posts found</div>
       
       <?php   
            endif;    
        ?>

        </main>

<?php require_once 'includes/footer.php'; ?>  