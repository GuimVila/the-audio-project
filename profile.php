<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/redirection.php'; ?>

<main id="main">    
    <h1>Edit Profile</h1>

    <!-- Show errors -->
    <?php if(isset($_SESSION['inserted'])): ?>
        <div class="alert">
            <?php echo $_SESSION['inserted']; ?>
        </div>   
    <?php elseif(isset($_SESSION['errors']['general'])): ?>   
    <div class="alert alert-error">
            <?php echo $_SESSION['errors']['general']; ?>
        </div>   
    <?php endif; ?>  

  

    <form name="profile" action="update_user.php" method="POST">  
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?=$_SESSION['user']["Username"]; ?>" />
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'Username') : ""; ?>
    
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?=$_SESSION['user']["Name"]; ?>"/>
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ""; ?>


        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?=$_SESSION['user']["LastName"]; ?>"/>
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : ""; ?>


        <label for="country">Country:</label>
        <input type="text" name="country" value="<?=$_SESSION['user']["Country"]; ?>"/>
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'country') : ""; ?>


        <label for="city">City:</label>
        <input type="text" name="city" value="<?=$_SESSION['user']["City"]; ?>"/>
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'city') : ""; ?>


        <label for="email">Email:</label>
        <input type="email" name="email" value="<?=$_SESSION['user']["Email"]; ?>"/>
        <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ""; ?>


        <input type="submit" name="submit" value="Update" />
    </form>
    <?php deleteErrors(); ?>
</main>

<?php require_once 'includes/footer.php'; ?>
