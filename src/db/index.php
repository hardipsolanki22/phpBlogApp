<?php
 $hostname = "localhost";
 $username = "root";
 $password = "";
 $dbname = "blogApp";

 $conn = new mysqli($hostname, $username, $password, $dbname);

 if(!$conn)
    die("Database conntion failed". $conn->connect_error);
?>