<?php 
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: ../auth/signin.php");
    exit();
}
$user = $_SESSION["userId"];
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
                 <form action="../utils/logout.php" method="POST">
                     <li>
                         <button class="item" name="logout" type="submit">
                            Logout
                        </button>
                    </li>
                 </form>
            </ul>
            <div class="menu_bar">
                <p>&#8801;</p>
            </div>
        </nav>
        <main>
            <div>

            </div>
        </main>
        <script src="./script.js"></script>
 </body>
 </html> 