<!-- Sidebar -->
<aside id="sidebar">
    <?php if(isset($_SESSION['user'])): ?>   
        <div id="user-loged-in" class="block-aside">
            <h3><?= $_SESSION['user']['Name'].' '.$_SESSION['user']['LastName']; ?></h3>  
            <!-- Buttons  -->
            <a href="session_close.php" class="button button-post">New Post</a>
            <a href="./includes/new_category.php" class="button button-category">New Category</a>
            <a href="session_close.php" class="button button-profile">Profile</a>
            <a href="session_close.php" class="button button-close">Log Out</a>

        </div>
    <?php endif; ?>
    <!-- Login -->
    <?php if(!isset($_SESSION['user'])): ?>   
    <div id="login" class="block-aside" role="login"> 
        <h3>Log in</h3>

        <?php if(isset($_SESSION['error_login'])): ?>   
            <div class="alert alert-error">
                <h3><?= $_SESSION['error_login']; ?></h3>  
            </div>
        <?php endif; ?>

        <form name="login" action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" />
            <label for="password">Password:</label>
            <input type="password" name="password" />
            <input type="submit" value="Log In" />
        </form>
    </div>
    <!-- Sign Up -->
    <div id="signup" class="block-aside" role="signup"> 
        <h3>Sign Up</h3>
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

        <form name="signup" action="signup.php" method="POST">  
            <label for="username">Username:</label>
            <input type="text" name="username" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'username') : ""; ?>
        
            <label for="name">Name:</label>
            <input type="text" name="name" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ""; ?>


            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : ""; ?>


            <label for="country">Country:</label>
            <input type="text" name="country" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'country') : ""; ?>


            <label for="city">City:</label>
            <input type="text" name="city" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'city') : ""; ?>


            <label for="email">Email:</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ""; ?>


            <label for="password">Password:</label>
            <input type="password" name="password" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : ""; ?>


            <input type="submit" name="submit" value="Sign Up" />
        </form>
        <?php deleteErrors(); ?>
    </div>
    <?php endif; ?>
</aside>

