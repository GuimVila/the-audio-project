

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/redirection-admin.php'; ?>

<!-- MAIN -->
<main id="main">    
<h1>New Category</h1>
<form name= "save_category" action="save_categories.php" method="POST">
    <label for="name">Insert Name:</label>
    <input type="text" name="name" />
    <input type="submit" value="Save" /> 
</form>
<br/>

<form name= "delete_category" action="delete_categories.php" method="POST">
<label for="category">Delete Category</label>
    <select name="category"> 
        <?php $categories = getCategories($db); 
            if(!empty($categories)):
                while($category = mysqli_fetch_assoc($categories)): 
        ?>
            <option value="<?=$category['Name']?>"> 
                <?=$category['Name']?>
            </option>
        <?php 
                endwhile;
            endif; 
        ?>
    </select>
    <input type="submit" value="Delete" /> 
</form>



</main>

<?php require_once 'includes/footer.php'; ?>