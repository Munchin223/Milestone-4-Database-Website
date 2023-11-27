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

// Query to check if a company
$query_CheckIf_Business = "SELECT Email FROM Product_Company WHERE Email LIKE '$Email'";
$query_result_Business = $conn->query($query_CheckIf_Business);
$business_row = $query_result_Business->fetch_assoc();
// If a company is returned through the query, then we identify the user as a company
if(!is_null($business_row)) {
    $isCompany = TRUE;
}

// Query to check if an Employee
$query_CheckIf_Employee = "SELECT Email FROM Employee WHERE Email LIKE '$Email'";
$query_result_Employee = $conn->query($query_CheckIf_Employee);
$employee_row = $query_result_Employee->fetch_assoc();

// If an employee is returned through the query, then we identify the user as an employee
if(!is_null($employee_row)) {
    $isEmployee = TRUE;
}

// Formats the login results into an array
$login_row = $query_result_Login->fetch_assoc();


// Checks if the email, password, and username is valid.
// if fails, reloads the page to prompt again
if ($login_row['Email'] != $Email || $login_row['Username'] != $User || $login_row['User_Password'] != $Pass) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?InvalidLogin');
}
// if both checks successful then redirects user 
else {
/**
 * REDIRECT USER TO STORE PAGE. CHANGE THE FILE LATER
 */
    // If its a company
    if($isCompany) {
        
        header('Location: ../ProductCompanyManage/ManageProduct.php?email='.$Email);
    }
    // If its an employee
    elseif($isEmployee) {
        header('Location: ../EmployeeManage/ManageUser.php?email='.$Email);
    }
    // If its anyone else ie. Customer.
    else {
        header('Location: Login.html?LoginSuccessful');
    }
}
$conn->close();
?>

