<?php 
include "../db/index.php";
 session_start();
  if (isset($_POST["form_submit"])) {
    $error = NULL;
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
      $error = "All fields are required";
      header("Location: signin.php?error=$error");
      exit();
    }

    // check email is valid 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid email address";
      header("Location: signin.php?error=$error");
      exit();
    }

    // check user is exist
    $userExistQuery = "SELECT * FROM users WHERE email = ?";
    $isUserExist = $conn->prepare($userExistQuery);
    $isUserExist->bind_param("s", $email);
    $isUserExist->execute();
    $result = $isUserExist->get_result();
    $userLength =  $result->num_rows;
    
    if (!$userLength) {
      $error = "User not found";
      header("Location: signin.php?error=$error");
      exit();
    }
    
    // $isUserExist->close();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
    $_SESSION['userId'] = $user['id'];
    header("Location: ../page/home.php");
    exit();
} else {
    $error = "Invalid password";
    header("Location: signin.php?error=$error");
    exit();
}
    // get user

    $conn->close();
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="../utils/stylesheet.css">
</head>
<body>
   <nav class="nav_bar">
            <a class="brand" href="../page/home.php">
                Blog
            </a>
            <ul class="nav_items">
                     <li>
                         <a class="item" href="./signin.php">
                            Login
                        </a>
                    </li>
                     <li>
                         <a class="item" href="./signup.php">
                            Signup
                        </a>
                    </li>
            </ul>
        </nav>
    <form action="" class="form" method="POST">
        <div class="form-text">
            <h1>Signin</h1>
            <p>Login your account</p>
            <p>Do you have no account ? <a href="./signup.php">Register</a></p>
            <?php if(isset($_SESSION["success"])) { ?>
                <p class="success_msg"
                    <?php 
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]); // remove session variable
                    session_destroy();  // destroy session
                     ?>
                </p>
            <?php } ?>
            <?php if (isset($_GET["error"])) { ?>
             <p class="err_mgs">
              <?php echo $_GET["error"]; ?>
               </p>
            <?php } ?>
        </div>
        <div>
            <label for="email">Email</label>
           <div>
             <input type="email" name="email" id="email">
           </div>
        </div>
        <div>
            <label for="password">Password</label>
           <div>
             <input type="password" name="password" id="password">
           </div>
        </div>
             <input class="submit-btn" value="Login" type="submit" name="form_submit"/>

    </form>
</body>
</html>