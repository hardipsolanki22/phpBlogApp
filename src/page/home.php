<?php 
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: ../auth/signin.php");
    exit();
}
$user = $_SESSION["userId"];

if (isset($_POST["logout"])) {
    session_unset();        // remove all session variables
    session_destroy();      // destroy session
    header("Location: ../auth/signin.php");
    exit();
}

?> 
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./stylesheet.css">
 </head>
 <body>
        <nav class="nav_bar">
            <a class="brand" href="./home.php">
                Blog
            </a>
            <ul class="nav_items">
                <li>
                    <a class="item" href="./home.php">Home</a>
                </li>
                <li>
                    <a class="item" class="item" href="./postForm.php">Create Blog</a>
                </li>
                <li>
                    <a class="item" href="./myBlog.php">My Blog</a>
                </li>
                 <!-- show logout button whne user is exist -->
                <?php
                 if ($user) {?>
                 <form action="" method="POST">
                     <li>
                         <button class="item" name="logout" type="submit">
                            Logout
                        </button>
                    </li>

                 </form>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <div>

            </div>
        </main>
 </body>
 </html> 