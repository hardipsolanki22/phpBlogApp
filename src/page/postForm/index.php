<?php 
include "../../db/index.php";
    session_start();

    // protect route
    $user = $_SESSION["userId"];
    if (!isset($user)) {
        header("Location: ../../auth/signin.php");
        exit();
    }
    if (isset($_POST["form_sbmt"])) {
        $postDescription = $_POST["description"];
        $imageName = $_FILES['post']['name'];
        $tmpName = $_FILES["post"]["tmp_name"];
       
        // validate fields
         if (empty($postDescription) || empty($imageName)) {
            $error = "All filed are required..!";
            header("Location: ./index.php?error=$error");
            exit();
        }

        // gemerate random number and add to beggining of the image name for unique image
        $randomNum = str_pad(rand(0, 9999), 4);
        $imageName = $randomNum . '_' .$imageName;

        $uploadDir = "../../public/"; // image upload to this folder public
        $uploadPath = $uploadDir. basename($imageName); // full path

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $query = "INSERT INTO posts (description, image, user) VALUES (?, ?, ?)";
            $post = $conn->prepare($query);
            $post->bind_param("ssi",$postDescription, $imageName, $user);

            if ($post->execute()) {     
            header("Location: ../home/");
            } else {
            $error = "Internal server error while create post";
                header("Location: ./index.php?error=$error");
            }
        }
       
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
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
    <form method="post" class="post_form" enctype="multipart/form-data">
        <div class="form_text">
            <h1>Post Form</h1>
        <?php if (isset($_GET["error"])) { ?>
            <p class="form_err">
                <?php echo $_GET["error"]; ?>
            </p>
        <?php } ?>
        </div>
        <div class="form_input">
            <label for="description">Enter Post Description: </label>
            <div>
                <textarea 
                    name="description"
                    class="post_description"
                    placeholder="Post description..."
                >
        </textarea>
            </div>
        </div>
        <div class="form_input">
            <label for="post">Post: </label>
            <div>
                <input type="file" name="post" accept="image/png, image.gpeg image/jpg image/gif">
            </div>
        </div>
        <div>
            <button type="submit" name="form_sbmt" class="form_btn">Upload</button>
        </div>
    </form>
    <script src="../../utils/script.js"></script>
</body>
</html> 