<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
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
                    <a class="item" class="item" href="../postForm/">Create Blog</a>
                </li>
                <li>
                    <a class="item" href="./index.php">My Blog</a>
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
    $userId = $_SESSION["userId"];
    if (!isset($userId)) {
        header("Location: ../../auth/signin.php");
        exit();
    }

    // delete post 
    if (isset($_POST["delete_post"])) {
         $postId = (int)  $_POST["post_id"]; 
        // get post fist
        $getPostImageQuery = "SELECT image FROM posts WHERE id = ?";
        $getPostImage = $conn->prepare($getPostImageQuery);
        $getPostImage->bind_param("i", $postId);
        $getPostImage->execute();
        $result = $getPostImage->get_result();
        $postImage = null;
        if ($result && $row = $result->fetch_assoc()) {
            $postImage =$row['image'];
        }

        // close previous database query
        $getPostImage->close();

        // delete post from database
        $deletePostquery = "DELETE FROM posts WHERE id = ? AND user = ?";
        $deletePost = $conn->prepare($deletePostquery); 
        $deletePost->bind_param("ii", $postId, $userId);
        
        // delete image from public repo
        if ($deletePost->execute()) {
            $path = "../../public/". $postImage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    // fecth user posts
    $query = "SELECT * FROM posts WHERE user = ?";
    $posts = $conn->prepare($query); 
    $posts->bind_param("i", $userId);
    $posts->execute();              
    $result = $posts->get_result();
    if ($result && $result->num_rows > 0) {
        while ($post = $result->fetch_assoc()) {
            ?>
             <div class="post_container">
                <form class="btn_container" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                      <button class="post_delete_btn" type="submit" name="delete_post">Delete</button>
                </form>
                <div class="post_img">
                    <img src="../../public/<?php echo $post['image']; ?>" alt="post">
                </div>
                <div class="post_description">
                    <p><?php echo $post["description"] ?></p>
                </div>
            </div>
            <?php
        }
    }else {
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