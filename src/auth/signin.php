<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./signup.css">
</head>
<body>
    <form action="" class="form">
        <div class="form-text">
            <h1>Login</h1>
            <p>Login your account</p>
            <p>Do You have no account ? <a href="./signup.php">Register</a></p>
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
        <button class="submit-btn">Login</button>
    </form>
</body>
</html>