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
    <title>PostForm</title>
    <link rel="stylesheet" href="./stylesheet.css">
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
                <a class="item" class="item" href="./index.php">Create Blog</a>
            </li>
            <li>
                <a class="item" href="../myPosts">My Blog</a>
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
    <form method="post" class="post_form">
        <div class="form_text">
            <h1>Post Form</h1>
            <p class="form_err">Post Description is required...!</p>
        </div>
        <div class="form_input">
            <label for="description">Enter Post Description: </label>
            <div>
                <textarea name="description" class="post_description" placeholder="Post description..." rows="6">
            </textarea>
            </div>
        </div>
        <div class="form_input">
            <label for="post">Post: </label>
            <div>
                <input type="file" name="post" accept="png jpeg">
            </div>
        </div>
        <div>
            <button type="submit" name="form_sbmt" class="form_btn">Upload</button>
        </div>
    </form>
    <script src="../home/script.js"></script>
</body>
</html>