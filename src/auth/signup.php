<?php 
include "../db/index.php";
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    if (empty($username) || empty($email) || empty($password)) {
      echo "All fields are required";
      exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $user = $conn->prepare($query);
    $user->bind_param("sss", $username, $email, $hashedPassword);

    if($user->execute()) {
      echo "User Create Successfully";
    } else {
      echo "Internal server error while create user";
    }

    $conn->close();


    
?>

