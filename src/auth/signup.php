<?php  
include "../db/index.php";
  session_start();
  
  // protect route
  if (isset($_SESSION["userId"])) {
    header("Location: ../page/home/");
    exit();
  }

  if (isset($_POST["form_submit"])) {
    $error = NULL;
     $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
      $error = "All fields are required";
      header("Location: signup.php?error=$error");
      exit();
    }

    // check email is valid 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid email address";
      header("Location: signup.php?error=$error");
      exit();
    }

    // check user is exist
    $userExistQuery = "SELECT * FROM users WHERE email = ?";
    $isUserExist = $conn->prepare($userExistQuery);
    $isUserExist->bind_param("s", $email);
    $isUserExist->execute();
    $userLength =  $isUserExist->get_result()->num_rows;
    
    if ($userLength > 0) {
      $error = "User already exists";
      header("Location: signup.php?error=$error");
      exit();
    }
    
    $isUserExist->close();
    // check username is unique 
    $usernameQuery = "SELECT * FROM users WHERE username = ?";
    $isUsernameExist = $conn->prepare($usernameQuery);
    $isUsernameExist->bind_param("s", $username);
    $isUsernameExist->execute();
    $usernameLength =  $isUsernameExist->get_result()->num_rows;
    if ($usernameLength > 0) {
      $error = "Username must be unique";
      header("Location: signup.php?error=$error");
      exit();
    }
    $isUsernameExist->close();

    // hashed password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $user = $conn->prepare($query);
    $user->bind_param("sss", $username, $email, $hashedPassword);

    if($user->execute()) {
      session_start();
      $success = "User Create Successfully";
      $_SESSION["success"] = "Regiter Successfully";
      header("Location: signin.php");
      exit();
    } else {
      $error = "Internal server error while create user";
      header("Location: signup.php?error=$error");
      exit();
    }

    $conn->close();
  }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../utils/stylesheet.css">
</head>
<body>
     <nav class="nav_bar">
            <a class="brand" href="#">
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
    <form  method="post" class="form">
        <div class="form-text">
            <h1>Signup</h1>
            <p class="text-line">Signup to create an account</p>
            <p class="text-line">Do you have an account ? <a href="./signin.php">Login</a></p>
            <?php if (isset($_GET["error"])) { ?>
             <p class="err_mgs">
               <?php echo $_GET["error"]; ?>
            </p>
            <?php } ?>
        </div>
        <div>
            <label for="username">Username</label>
           <div>
             <input type="text" name="username" id="username">
           </div>
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
         <button class="submit-btn" type="submit" name="form_submit">Regiter</button>
    </form>
</body>
</html>
