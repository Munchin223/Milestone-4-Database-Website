<?php
$servername = "localhost";
$username = "root";
$password ="";
$database = "catalogue";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}
else {
    echo "Connection Successful!";
}
?>

