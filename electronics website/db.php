<?php
//localhost credentials
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "electronics_db";
//infinity
//$host = "sql207.infinityfree.com";
//$username = "if0_38388175";
//$password = "6NOAIR3UgpZDK";
//$database = "if0_38388175_electronics";

//create connection
$conn = new mysqli($host, $username, 
$password, $database);

//check connection
if ($conn->connect_error) {
    die("connection failed: ".$conn->connect_error);
} else {
   // echo "database connected successfully";
}
?>