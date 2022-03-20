<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <title>Learning Project</title>
</head>
<body>

    <!-- HEADER -->
    <header id="header">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Learning Project
            </a>
        </div>
    <!-- NAV BAR  (Dropdown menu should always be coded as a Button, which can be <div role="button">) -->
    <nav id="nav">
        <ul>
            <li>
                <a href="index.php">Home</a>   
            </li>
            <li>
                <a href="index.php">Category 1</a>   
            </li>
            <li>
                <a href="index.php">Category 2</a>   
            </li>
            <li>
                <a href="index.php">Category 3</a>   
            </li>
            <li>
                <a href="index.php">Category 4</a>   
            </li>
        </ul>
    </nav>
    <div class="clearfix"></div>
    </header>

    <div id="login-container" >  
        <!-- Sidebar -->
        <aside id="sidebar">
            <!-- Login -->
            <div id="login" class="block-aside" role="login"> 
                <h3>Log in:</h3>
                <form name="login" action="login.php" method="POST">
                    <label for="email">Email:</label>
                    <input type="email" name="email" />
                    <label for="password">Password:</label>
                    <input type="password" name="password" />
                    <input type="submit" value="Submit" />
                </form>
            </div>

            <div id="register" class="block-aside" role="register"> 
                <h3>Sign Up:</h3>
                <form name="register" action="register.php" method="POST">
                    
                    <label for="username">Username:</label>
                    <input type="text" name="username" />
                    <label for="name">Name:</label>
                    <input type="text" name="name" />
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" />
                    <label for="country">Country:</label>
                    <input type="text" name="country" />
                    <label for="city">City:</label>
                    <input type="text" name="city" />
                    <label for="email">Email:</label>
                    <input type="email" name="email" />
                    <label for="password">Password:</label>
                    <input type="password" name="password" />
                    <input type="submit" value="Sign Up" />
                </form>
            </div>
        </aside>
    </div>

<!-- MAIN -->
    <main id="main">    
        <h1>Last Posts</h1>
        <article class="post">
            <h2>Post Title</h2>
            <p>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            </p>
        </article>
    </main>

<!-- SECTION (Not related) The "Stay Connected" "div" of a website should be a Section -->


<!-- FOOTER -->
    <footer id="footer">
        <p>Developed by Guillem Vila &copy; 2022</p>
    </footer>
</body>
</html>
