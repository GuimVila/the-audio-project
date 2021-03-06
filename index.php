
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
        <!-- MAIN -->
    <main id="main">    
        <h1>Last Posts</h1>

        <?php $lastPosts = getPosts($db, null, true); 
      
        if(!empty($lastPosts)): 
            while($lastPost = mysqli_fetch_assoc($lastPosts)):  
        ?>
        <article class="post">
            <a href="post.php?id=<?=$lastPost['Id']?>">
                <h2><?=$lastPost['Title']?></h2>
                <span class="post-date"><?=$lastPost['Category'].' | '.$lastPost['CreationDate'] ?></span>
                <p><?=substr($lastPost['Description'], 0, 466)."..."?></p>
            </a>
        </article>
        <?php   
            endwhile; 
        endif; 
        ?>

        <div id="read-all" role="button">
            <a href="posts.php">Read All</a>
        </div>  
        </main>

<?php require_once 'includes/footer.php'; ?>
