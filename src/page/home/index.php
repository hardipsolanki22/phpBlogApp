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
            <a class="brand" href="./index.php">
                Blog
            </a>
            <ul class="nav_items">
                <li>
                    <a class="item" href="./index.php">Home</a>
                </li>
                <li>
                    <a class="item" class="item" href="../postForm/">Create Blog</a>
                </li>
                <li>
                    <a class="item" href="../myPosts/">My Blog</a>
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

<?php 
include "../../db/index.php";
    session_start();

    // protect route
    if (!isset($_SESSION["userId"])) {
        header("Location: ../../auth/signin.php");
        exit();
    }
    // get all posts and join user table based on userId
    $query = "SELECT users.username , posts.description, posts.image
    FROM users
    INNER JOIN posts ON 
    users.id = posts.user";
    $posts = $conn->prepare($query); 
    $posts->execute();              
    $result = $posts->get_result();

    if ($result->num_rows > 0) {
        while ($post = $result->fetch_assoc()) {
            ?>
             <div class="post_container">
                <div class="user">
                    <img class="user_avatar" src="../../assets/userDeafultAavtar.png" alt="avarae">
                    <p><?php echo $post["username"]; ?></p>
                </div>
                <div class="post_img">
                    <img src="../../public/<?php echo $post['image']; ?>" alt="post">
                </div>
                <div class="post_description">
                    <p><?php echo $post["description"] ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="no_posts">
            <h1>No Posts Found</h1>
        </div>
        <?php
    }
    $conn->close();
?>
        </main>
        <script src="../../utils/script.js"></script>
 </body>
 </html> 