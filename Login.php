<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "catalogue";
// Getting values
$input_username = $_POST["usr"];
$input_password = $_POST['pwd'];
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else {
echo "Connection Succesful! <br>";
}
//construct the query
// $query = "INSERT INTO product VALUES('$input_username','$input_password')";
// //Execute the query
// if ($conn->query($query) === TRUE) {
// echo "New record created successfully!";
// } else {
// echo "Error: " . $conn->error;
// }
// $conn->close();
?>