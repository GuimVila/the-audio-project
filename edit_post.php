

<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/redirection.php'; ?>

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
<h1>Edit Post</h1>
<p class="post-title">
    <?=$newPost['Title']?>
</p>

    <form name= "save_post" action="save_post.php?edit=<?=$newPost['Id']?>" method="POST">
        <label for="title" class="post-title-box">Title</label>
        <input type="text" name="title" />
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'title') : ""; ?>

        <label for="description">Description</label>
        <textarea name="description" class="post-description-box"><?=$newPost['Description']?></textarea>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'description') : ""; ?>

        <label for="category">Category</label>
        <select name="category"> 
            <?php $categories = getCategories($db); 
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)): 
            ?>
                <option value="<?=$category['Id']?>"
                    <?=($category['Id'] == $newPost['CategoryId']) ? 'selected="selected"' : '' ?>> 
                    <?=$category['Name']?>
                </option>

            <?php 
                    endwhile;
                endif; 
            ?>
        </select>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'category') : ""; ?>

        <input type="submit" value="Edit" /> 
    </form>
    <?php deleteErrors(); ?>
</main>

<?php require_once 'includes/footer.php'; ?>  