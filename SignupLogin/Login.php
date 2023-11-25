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

// Execute queries
$query_Validate_Email = "SELECT Email FROM Login_Has WHERE Email LIKE '$Email'";
$query_result_Email = $conn->query($query_Validate_Email);

$query_Validate_Login = "SELECT Email, Username, User_Password FROM Login_Has WHERE Email LIKE '$Email' AND Username LIKE '$User' AND User_Password LIKE '$Pass'";
$query_result_Login = $conn->query($query_Validate_Login);

// Formats results into variables
$email_row = $query_result_Email->fetch_assoc();
$login_row = $query_result_Login->fetch_assoc();
echo print_r($login_row);

// Checks if the email is valid
// if fails, reloads the page to prompt again
if (empty($Email) || $email_row["Email"] != $Email) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidEmail');
}
// Checks if the password, and username is valid.
// if fails, reloads the page to prompt again
elseif ($login_row['Email'] != $Email || $login_row['Username'] != $User || $login_row['User_Password'] != $Pass) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}
// if both checks successful, sends user to catalogue page
else {
/**
 * REDIRECT USER TO STORE PAGE. CHANGE THE FILE LATER
 */
    header('Location: Login.html?LoginSuccessful');
}
$conn->close();
?>

