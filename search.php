
<?php

    if(!isset($_POST['search'])) {
        header('Location: index.php');  
    }      
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

        <!-- MAIN -->
    <main id="main">   
       
        <h1>Search: <?=$_POST['search']?> Posts</h1>

        <?php 
        
            $categoryPosts = getPosts($db, $_POST['search'], null, null); 
            
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