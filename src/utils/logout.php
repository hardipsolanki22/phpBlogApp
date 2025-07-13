<?php
    if (isset($_POST["logout"])) {
    session_start();
    session_unset();        // remove all session variables
    session_destroy();      // destroy session
    header("Location: ../auth/signin.php");
    exit();
}

?>