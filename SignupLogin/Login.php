<?php
/**
 * Handles Login queries for all users. 
 * Query feedback is displayed in the url after submitting.
 * 
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

$isCompany = FALSE;
$isEmployee = FALSE;

// Query to get user login
$query_Validate_Login = "SELECT Email, Username, User_Password FROM Login_Has WHERE Email LIKE '$Email' AND Username LIKE '$User' AND User_Password LIKE '$Pass'";
$query_result_Login = $conn->query($query_Validate_Login);

$query_CheckIf_Business = "SELECT Email FROM Product_Company WHERE Email LIKE '$Email'";
$query_result_Business = $conn->query($query_CheckIf_Business);
$business_row = $query_result_Business->fetch_assoc();
// if 
if(!is_null($business_row)) {
    $isCompany = TRUE;
}

$query_CheckIf_Employee = "";
// Formats results into arrays
$login_row = $query_result_Login->fetch_assoc();





// Checks if the email, password, and username is valid.
// if fails, reloads the page to prompt again
if ($login_row['Email'] != $Email || $login_row['Username'] != $User || $login_row['User_Password'] != $Pass) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}
// if both checks successful, sends user to catalogue page
else {
/**
 * REDIRECT USER TO STORE PAGE. CHANGE THE FILE LATER
 */
    if($isCompany) {
        
        header('Location: ../ProductCompanyManage/ManageProduct.php?email='.$Email);
    }
    else 
        header('Location: Login.html?LoginSuccessful');
}
$conn->close();
?>

