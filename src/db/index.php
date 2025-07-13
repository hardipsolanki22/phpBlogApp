<?php
 $hostname = "localhost";
 $username = "root";
 $password = "";
 $dbname = "blogApp";

 $conn = new mysqli($hostname, $username, $password, $dbname);

 if($conn)
     echo "Database Connect Successfully: ";
 else
    die("Database conntion failed". $conn->connect_error);
?>