<?php
/**
 * Handles Signup queries for businesses. 
 * Query feedback is displayed in the url after submitting.
 */
$servername = "localhost";
$username = "root";
$password ="root";
$database = "catalogue";

$Email = $_POST["email"];
$Phone = $_POST["phone"];
$User = $_POST["username"];
$Pass = $_POST["password"];
$Brand = $_POST["brand"];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}
else {
    echo "Connection Successful!";
}

//construct the user info query
$query_User_Info = "INSERT INTO User_Info VALUES('$Email','$Phone')";


//execute the query
// if fails, reloads the page to prompt again
if ($conn->query($query_User_Info) === FALSE) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidEmail/Phone');
}

// construct the user password query
$query_Login = "INSERT INTO Login_Has VALUES
('$User','$Pass',(SELECT Email FROM User_Info WHERE Email='$Email'))";

//execute the query
// if fails, reloads the page to prompt again
if ($conn->query($query_Login) === FALSE) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}

$query_Brand = "INSERT INTO Product_Company VALUES
('$Email','$Brand')";

if ($conn->query($query_Brand) === FALSE) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidBrand');
}
$conn->close();
// if both queries successful, sends user back to login page
header('Location: Login.html?SignUpSuccessful');
die;
?>

