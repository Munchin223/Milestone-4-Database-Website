<?php
/**
 * Handles Login queries for all users. 
 * Query feedback is displayed in the url after submitting.
 * 
 * For some lovely reason, adding a where condition to a query makes the return value a boolean.
 * Meaning, at the moment, I cannot find a way to verify if the login data is valid.
 * Currently, the code will accept any input, regardless if its in the database.
 */
$servername = "localhost";
$username = "root";
$password ="root";
$database = "catalogue";

$Email = $_POST["email"];
$User = $_POST["username"];
$Pass = $_POST["password"];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}
else {
    echo "Connection Successful!";
}

// validate email
$query_Validate_Email = "SELECT * FROM User_Info WHERE Email='$Email')";

$result = $conn->query($query_Validate_Email);

//execute the query
// if fails, reloads the page to prompt again
if ($result === FALSE) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}

// validate password and username
$query_Validate_Login = "SELECT * FROM Login_Has WHERE Email='$Email' AND Username='$User' AND Password='$Pass')";

//execute the query
// if fails, reloads the page to prompt again
if ($conn->query($query_Validate_Login) === FALSE) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}

$conn->close();
// if both queries successful, sends user back to catalogue page
/**
 * REDIRECT USER TO STORE PAGE
 */
header('Location: Login.html?LoginSuccessful');
die;
?>

