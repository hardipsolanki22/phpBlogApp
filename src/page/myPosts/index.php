<?php 
session_start();

// protect route
if (!isset($_SESSION["userId"])) {
    header("Location: ../../auth/signin.php");
    exit();
}
?> 


<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../home/stylesheet.css">
 </head>
 <body>
        <nav class="nav_bar">
            <a class="brand" href="../home/">
                Blog
            </a>
            <ul class="nav_items">
                <li>
                    <a class="item" href="../home/">Home</a>
                </li>
                <li>
                    <a class="item" class="item" href="../postForm/index.php">Create Blog</a>
                </li>
                <li>
                    <a class="item" href="./index.html">My Blog</a>
                </li>
                 <form action="../../utils/logout.php" method="POST">
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
            <div class="post_container">
                <div class="btn_container">
                      <button class="post_delete_btn">Delete</button>
                </div>
                <div class="post_img">
                    <img src="../../assets/Screenshot (32).png" alt="post">
                </div>
                <div class="post_description">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                    </p>
                </div>
            </div>
            <div class="post_container">
                <div class="btn_container">
                      <button class="post_delete_btn">Delete</button>
                </div>
                <div class="post_img">
                    <img src="../../assets/Screenshot (32).png" alt="post">
                </div>
                <div class="post_description">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sed?
                    </p>
                </div>
            </div>
        </main>
        <script src="../home/script.js"></script>
 </body>
 </html> 