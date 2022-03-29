
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/redirection.php'; ?>

<!-- MAIN -->
<main id="main">    
<h1>New Post</h1>
    <form name= "save_post" action="save_post.php" method="POST">
        <label for="title" class="post-title-box">Title</label>
        <input type="text" name="title" />
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'title') : ""; ?>

        <label for="description">Description</label>
        <textarea name="description" class="post-description-box"> </textarea>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'description') : ""; ?>

        <label for="category">Category</label>
        <select name="category"> 
            <?php $categories = getCategories($db); 
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)): 
            ?>
                <option value="<?=$category['Id']?>"> 
                    <?=$category['Name']?>
                </option>

            <?php 
                    endwhile;
                endif; 
            ?>
        </select>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'category') : ""; ?>

        <input type="submit" value="Save" /> 
    </form>
    <?php deleteErrors(); ?>
</main>

<?php require_once 'includes/footer.php'; ?>